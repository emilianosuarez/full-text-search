{{ html()->form('POST', route($page->url.'.store'))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() }}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
			{!! html()->label()->class('control-label')->for('title')->text('Title') !!}
			<span class="text-danger">*</span>
			{!! html()->text('title',NULL)->placeholder('Type Title here')->class('form-control')->id('title') !!}
		</div>
		<!-- <div class='form-group'>
			{!! html()->label()->class('control-label')->for('content')->text('Content') !!}
			<span class="text-danger">*</span>
			{!! html()->textarea('content',NULL)->class('form-control')->id('content') !!}
		</div> -->

		<div class='form-group'>
            {!! html()->label('Content','content')->class('control-label') !!}
            <span class="text-danger">*</span>
            {!! html()->textarea('content')->class('form-control')->id('content')->placeholder('Type Here')->required() !!}
        </div>

		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('active')->text('Active') !!}
			{!! html()->number('active',NULL)->placeholder('Type Active here')->class('form-control')->id('active') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('article_created_at')->text('Article Created At') !!}
			{!! html()->dateTime('article_created_at',NULL)->class('form-control')->id('article_created_at') !!}
		</div>
		<!-- <div class='form-group'>
			{!! html()->label()->class('control-label')->for('user_id')->text('User') !!}
			{!! html()->text('user_id',NULL)->placeholder('Type User here')->class('form-control')->id('user_id') !!}
		</div> -->
    </div>
</div>
{!! html()->hidden('table-id','datatable')->id('table-id') !!}
{{--{!! html()->hidden('function','loadMenu,sidebarMenu')->id('function') !!}--}}
{{--{!! html()->hidden('redirect',url('/dashboard'))->id('redirect') !!}--}}
{!! html()->form()->close() !!}
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
    $('.modal-title').html('<i class="fa fa-plus-circle"></i> Add Data {!! $page->title !!}');
    $('.submit-data').html('<i class="fa fa-save"></i> Save Data');
	$('#content').summernote({
        tabsize: 2,
        height: 250,
        toolbar: [
            "fontsize",
            "paragraph",
            "table",
            "insert",
            "codeview",
            "link",
        ],
        fontSizes: ['8', '9', '10', '11', '12', '14', '18', '24', '36'],
    });
</script>
