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

                                <table cellspacing="5" cellpadding="5">
                                    <tbody>
                                        <tr>
                                            <td>Date from:</td>
                                            <td><input type="text" id="date_from" name="date_from"></td>
                                        </tr>
                                        <tr>
                                            <td>Date to:</td>
                                            <td><input type="text" id="date_to" name="date_to"></td>
                                        </tr>
                                    </tbody>
                                </table>


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
    <script src="{{ url($template.'/assets/vendor_components/jquery-validation-1.17.0/lib/jquery.form.js') }}"></script>
    <!-- <script src="{{ url($template.'/assets/vendor_components/datatable/datatables.min.js') }}"></script> -->

    <!-- <script src="{{ url($template.'/assets/vendor_components/select2/dist/js/select2.js') }}"></script>
    <script src="{{ url($template.'/assets/vendor_components/sweetalert/sweetalert.min.js') }}"></script> -->
    <script src="{{ url($template.'/assets/vendor_plugins/summernote/summernote-lite.min.js') }}"></script>

    <!--
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script> 
    <script src="https://cdn.datatables.net/datetime/1.5.4/js/dataTables.dateTime.min.js"></script>

    <script src="{{ url('/js/'.$backend.'/'.$page->code.'/datatable.js') }}"></script>
    <script src="{{ url('js/jquery-crud.js') }}"></script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{ url($template.'/assets/vendor_plugins/summernote/summernote-lite.css') }}">

    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/datetime/1.5.4/css/dataTables.dateTime.min.css" rel="stylesheet" />
@endpush
