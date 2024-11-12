<div class="panel shadow-sm">
    <div class="panel-body">
        <div class="row">
			<div class="col-md-12">
				<div class="form-group">
					{!! html()->span()->text("Title")->class("control-label") !!}
					{!! html()->p($data->title)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
                    <label>Content:</label>
                    <div class="p-10 shadow-sm">
                        {!! $data->content !!}
                    </div>
                </div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					{!! html()->span()->text("Article Created At")->class("control-label") !!}
					{!! html()->p($data->article_created_at)->class("form-control") !!}
				</div>
			</div>
		</div>
    </div>
</div>
<style>
    .modal-lg {
        max-width: 1000px !important;
    }
</style>
<script>
    $('.submit-data').hide();
    $('.modal-title').html('<i class="fa fa-search"></i> Detail Data {!! $page->title !!}');
</script>
