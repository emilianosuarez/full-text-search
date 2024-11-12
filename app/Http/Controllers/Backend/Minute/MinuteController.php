<?php

namespace App\Http\Controllers\Backend\Minute;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MinuteController extends Controller
{
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
        $data = $this->model::select('id', 'title', 'content', 'active', 'article_created_at');

        return datatables()->of($data)
            ->filterColumn('content', function($query, $keyword) {
                $sql = "MATCH(title, content) AGAINST('{$keyword}' IN NATURAL LANGUAGE MODE)";
                $query->whereRaw($sql);
            })
            ->addColumn('action', function ($data) use ($user) {
                $button ='';
                if($user->read) {
                    $button .= '<button type="button" class="btn-action btn btn-sm btn-outline" data-title="Detail" data-action="show" data-url="'.$this->url.'" data-id="'.$data->id.'" title="Show"><i class="fa fa-eye text-info"></i></button>';
                }
                // if($user->update){
                //     $button.='<button type="button" class="btn-action btn btn-sm btn-outline" data-title="Edit" data-action="edit" data-url="'.$this->url.'" data-id="'.$data->id.'" title="Edit"> <i class="fa fa-edit text-warning"></i> </button> ';
                // }
                if($user->delete) {
                    $button.='<button type="button" class="btn-action btn btn-sm btn-outline" data-title="Delete" data-action="delete" data-url="'.$this->url.'" data-id="'.$data->id.'" title="Delete"> <i class="fa fa-trash text-danger"></i> </button>';
                }
                return "<div class='btn-group'>".$button."</div>";
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
			'content' => 'required',
			'active' => 'required',
			'article_created_at' => 'required',
			// 'user_id' => 'required|exists:users,id',
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
			// 'user_id' => 'required|exists:users,id',
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
}
