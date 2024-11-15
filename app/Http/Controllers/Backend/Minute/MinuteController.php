<?php

namespace App\Http\Controllers\Backend\Minute;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MinuteController extends Controller
{
    CONST STRING_CONTEXT_LENGTH = 2500;

    public function index()
    {
        return view($this->view.'.index');
    }

    public function create()
    {
        return view($this->view.'.create');
    }

    public function data(Request $request)
    {
        $user = $request->user();
        $search = $request->input('search');
        $dateFrom = $request->input('date_from', null);
        $dateTo = $request->input('date_to', null);

        $data = $this->model::select('id', 'title', 'content', 'active', 'article_created_at');

        return datatables()->of($data)
            ->editColumn('content', function ($data) use ($search)  {
                return $this->getContent($data->content, $search['value']);
            })
            ->filterColumn('content', function($query, $keyword)  use ($dateFrom, $dateTo) {
                $this->getQueryFilter($query, $keyword, $dateFrom, $dateTo);
            })
            ->filterColumn('article_created_at', function($query, $keyword) use ($search, $dateFrom, $dateTo) {
                $this->getQueryFilter($query, $search['value'], $dateFrom, $dateTo);
            })
            ->addColumn('action', function ($data) use ($user) {
                $button ='';
                if($user->read) {
                    $button .= '<button type="button" class="btn-action btn btn-sm btn-outline" data-title="Detail" data-action="show" data-url="'.$this->url.'" data-id="'.$data->id.'" title="Show"><i class="fa fa-eye text-info"></i></button>';
                }
                if($user->delete) {
                    $button.='<button type="button" class="btn-action btn btn-sm btn-outline" data-title="Delete" data-action="delete" data-url="'.$this->url.'" data-id="'.$data->id.'" title="Delete"> <i class="fa fa-trash text-danger"></i> </button>';
                }
                return "<div class='btn-group'>".$button."</div>";
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'content'])
            ->make();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
			'content' => 'required',
			'active' => 'required',
			'article_created_at' => 'required',
        ]);

        if ($this->model::create($request->all())) {
            $response=[ 'status'=>TRUE, 'message'=>'Data saved successfully'];
        }
        return response()->json($response ?? ['status'=>FALSE, 'message'=>'Data failed to save']);
    }

    public function show($id)
    {
        $data = $this->model::find($id);
        return view($this->view.'.show', compact('data'));
    }

    public function edit($id)
    {
        $data = $this->model::find($id);
        return view($this->view.'.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
			'content' => 'required',
			'active' => 'required',
			'article_created_at' => 'required',
        ]);

        $data=$this->model::find($id);
        if($data->update($request->all())){
            $response=[ 'status'=>TRUE, 'message'=>'Data saved successfully'];
        }
        return response()->json($response ?? ['status'=>FALSE, 'message'=>'Data failed to save']);
    }

    public function delete($id)
    {
        $data=$this->model::find($id);
        return view($this->view.'.delete', compact('data'));
    }

    public function destroy($id)
    {
        $data=$this->model::find($id);
        if($data->delete()){
            $response=[ 'status'=>TRUE, 'message'=>'Data berhasil dihapus'];
        }
        return response()->json($response ?? ['status'=>FALSE, 'message'=>'Data gagal dihapus']);
    }

    private function getQueryFilter($query, $searchValue, $dateFrom, $dateTo)
    {
        if ($searchValue) {
            $sql = "MATCH(title, content) AGAINST('{$searchValue}' IN NATURAL LANGUAGE MODE)";
            $query->whereRaw($sql);
        }

        if ($dateFrom) {
            $query->where('article_created_at', '>=', $dateFrom);
        }
        if ($dateTo) {
            $query->where('article_created_at', '<=', $dateTo);
        }
    }

    private function getContent($content, $searchValue)
    {
        $charSize = self::STRING_CONTEXT_LENGTH;

        if (empty($searchValue)) {
            return mb_substr($content, 0, $charSize * 2);
        }

        $values = explode(' ', $searchValue);
        $startPosition = null;
        $i = 0;

        do {
            $matchingWord = $values[$i];
            $startPosition = stripos($content, $matchingWord);
            if (($i == count($values)) && ($startPosition === false)) {
                $startPosition = 0;
            }
            $i++;
        } while ($startPosition !== false);

        $searchLength = strlen($matchingWord);
        $init = ($startPosition - $charSize) < 0 ? 0 : ($startPosition - $charSize);
        $end = $searchLength + $charSize * 2;
        $textPreview = substr($content, $init, $end);
        return preg_replace('/^[^>]*>\s*/', '', $textPreview) . '...';
    }
}
