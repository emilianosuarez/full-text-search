{!! html()->modelForm($data,'PUT', route($page->url.'.update', $data->id))->id('form-create-'.$page->code)->acceptsFiles()->class('form form-horizontal')->open() !!}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
            {!! html()->label('Name Level','name')->class('control-label') !!}
            {!! html()->text('name',$data->name)->placeholder('Type level name here level disini')->class('form-control')->id('name') !!}
        </div>
        <div class='form-group'>
            {!! html()->label('Code Level','code')->class('control-label') !!}
            {!! html()->text('code',$data->code)->placeholder('Type the code here')->class('form-control')->id('code') !!}
        </div>
        <div class='form-group'>
            {!! html()->label('Change the access rights owned by this level?','access')->class('control-label') !!}
            <div class="row mt-2">
                @foreach(collect(config('master.app.level')) as $key => $level)
                    <div class="col-auto">
                        {!! html()->checkbox('access[]',in_array($level, ($data->access ?? [])) ? (($data->access[$level] ?? false) ? true : false) : false,$level)->id('md_checkbox_'.$key)->class('filled-in chk-col-primary') !!}
                        {!! html()->label($level, 'md_checkbox_'.$key)->class('text-uppercase') !!}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
{!! html()->hidden('table-id','datatable')->id('table-id') !!}
{!! html()->form()->close() !!}
<style>
    .modal-lg {
        max-width: 1000px !important;
    }
</style>
<script>
    $('.modal-title').html('<i class="fa fa-edit"></i> Edit Data {{ $page->title }}');
    $('.submit-data').html('<i class="fa fa-save"></i> Save Data');
</script>
