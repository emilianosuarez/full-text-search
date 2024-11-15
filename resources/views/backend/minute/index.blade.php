@extends('backend.main.index')
@push('title', $page->title ?? 'Minute')
@section('content')
    <div class="content-wrapper">
        <div class="container-full">
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <h3 class="page-title"><i class="{!! $page->icon !!}"></i> {!! $page->title ?? 'Page Name' !!} </h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"> {!! $page->subtitle ?? 'Welcome to '.$page->title.' page' !!}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header">
                                <h4 class="box-title">Content {!! $page->title ?? 'Page Name' !!}</h4>
                                @if($user->create)
                                    <button type="button" class="btn-action pull-right btn btn-success btn-sm" data-title="Add" data-action="create" data-url="{!! $page->url ?? '' !!}">
                                        <span class="fa fa-plus-circle"></span> Add
                                    </button>
                                @endif
                            </div>
                            <div class="box-body">
                                <div class="box-body" align="right">
                                    <table cellspacing="5" cellpadding="5">
                                            <div>
                                                <td>Date from:</td>
                                                <td><input class="form-control" type="date" id="date_from" name="date_from"></td>
                                            </div>
                                            <div>
                                                <td>Date to:</td>
                                                <td><input class="form-control" type="date" id="date_to" name="date_to"></td>
                                            </div>
                                    </table>
                                </div>
                                <table id="datatable" class="table table-bordered table-striped" style="width: 100%;">
									<thead>
                                        <tr>
                                            <th class="w-0">No</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Active</th>
                                            <th>Article Created At</th>
                                            <th class="text-center w-0">Action</th>
                                        </tr>
									</thead>
									<tbody>
									</tbody>
								</table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ url($template.'/assets/vendor_components/select2/dist/js/select2.js') }}"></script>
    <script src="{{ url($template.'/assets/vendor_components/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ url($template.'/assets/vendor_components/jquery-validation-1.17.0/lib/jquery.form.js') }}"></script>
    <script src="{{ url($template.'/assets/vendor_components/datatable/datatables.min.js') }}"></script>
    <script src="{{ url($template.'/assets/vendor_plugins/summernote/summernote-lite.min.js') }}"></script>
    <script src="{{ url('/js/'.$backend.'/'.$page->code.'/datatable.js') }}"></script>
    <script src="{{ url('js/jquery-crud.js') }}"></script>
    <script src="{{ url('js/jquery.highlight.js') }}"></script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{ url($template.'/assets/vendor_plugins/summernote/summernote-lite.css') }}">
    <link rel="stylesheet" href="{{ url('css/dataTables.searchHighlight.css') }}">
@endpush
