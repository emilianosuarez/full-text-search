{!! html()->modelForm($data,'PUT', route($page->url.'.update', $data->id))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() !!}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
			{!! html()->label()->class('control-label')->for('title')->text('Title') !!}
			{!! html()->text('title',$data->title)->placeholder('Type Title here')->class('form-control')->id('title') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('content')->text('Content') !!}
			{!! html()->textarea('content',$data->content)->class('form-control')->id('content') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('active')->text('Active') !!}
			{!! html()->number('active',$data->active)->placeholder('Type Active here')->class('form-control')->id('active') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('article_created_at')->text('Article Created At') !!}
			{!! html()->dateTime('article_created_at',$data->article_created_at)->class('form-control')->id('article_created_at') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('user_id')->text('User') !!}
			{!! html()->number('user_id',$data->user_id)->placeholder('Type User here')->class('form-control')->id('user_id') !!}
		</div>
    </div>
</div>
{!! html()->hidden('table-id','datatable')->id('table-id') !!}
{{--{!! html()->hidden('function','loadMenu,sidebarMenu')->id('function') !!}--}}
{{--{!! html()->hidden('redirect',url('/dashboard'))->id('redirect') !!}--}}
{!! html()->closeModelForm() !!}
<style>
    .select2-container {
        z-index: 9999 !important;
        width: 100% !important;
    }

    .modal-lg {
        max-width: 1000px !important;
    }
</style>
<script>
    $('.select2').select2();
    $('.modal-title').html('<i class="fa fa-edit"></i> Edit Data {!! $page->title !!}');
    $('.submit-data').html('<i class="fa fa-save"></i> Save Data');
</script>