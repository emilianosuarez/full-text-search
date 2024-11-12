{!! html()->form('DELETE', route($page->code.'.destroy', $data->id))->id('form-create-'.$page->code)->class('form form-horizontal')->open() !!}
<div class="row">
    <div class="col-md-12">
        <label class="control-label h6">Are You Sure You Want to Delete This Data?</label>
        <div class="info-data">
            <div class="panel">
                <div class="panel-body panel-dark bg-dark">
                    @foreach(collect(json_decode($data,TRUE))->except(['id','created_at','updated_at']) as $key => $value)
                        <p>
                            <code>{{ $key }}</code>
                            <span class="text-danger">:</span>
                            <span class="text-info">{{ $value }}</span>
                        </p>
                    @endforeach
                    <div class="mt-3">
                        @if($data->access_menu->count() > 0)
                            <p>
                                <span class="text-info">The menu is used by:</span>
                                @foreach($data->access_menu as $access)
                                    <span class="badge badge-info">{{ $access->access_group->name }}</span>
                                @endforeach
                            </p>
                            <p>
                                <span class="text-danger">If you delete this data, the related menu access data will also be deleted.</span>
                            </p>
                        @endif
                        <p>
                            <span class="text-danger">Attention!</span>
                            <span class="text-info">Data that has been deleted cannot be recovered.</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <span class="message"></span>
    </div>
</div>
{!! html()->hidden('function')->value('loadMenu,sidebarMenu')->id('function') !!}
{!! html()->form()->close() !!}
<script>
    $('.modal-title').html('<i class="mdi mdi-delete-forever"></i> Delete Data {{ $page->title }}');
</script>
