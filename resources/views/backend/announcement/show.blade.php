<div class="panel shadow-sm">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Title :</label>
                    {{  $data->title }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Target Menu :</label>
                    {{  $data->menu->title }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Effective date :</label>
                    {{  date('d-m-Y', strtotime($data->start)) }} to {{  date('d-m-Y', strtotime($data->end)) }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Level of Interest :</label>
                    <span
                        class="badge badge-{{  config('master.content.announcement.color.'.$data->urgency) }}">{{  config('master.content.announcement.status.'.$data->urgency) }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Publication Status :</label>
                    {!! $data->publish ? "<span class='badge badge-success'>Featured</span>" : "<span class='badge badge-danger'>Tidak Featured</span>" !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Announcement Contents :</label>
                    <div class="p-10 shadow-sm">
                        {!! $data->content !!}
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Supporting Files :</label>
                     @if(!$data->file->isEmpty())
                        <ul>
                            @foreach($data->file as $file)
                                <li>
                                    <a href="{{  $file->link_download }}" class="fa fa-download"></a> | <a href="{{  $file->link_stream }}" target="_blank" class="fa fa-search"></a> | {{  $file->file_name }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <span class="badge badge-danger">Tidak ada file</span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Relation :</label>
                    @if($data->parent)
                        <a href="#" type="button" class="btn-action" data-title="Detail" data-action="show" data-url="announcement" data-id="{{ $data->parent_id }}" title="Show"> {{ $data->parent->title }}</a>
                    @else
                        -
                    @endif
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
    $('.modal-title').html('<i class="fa fa-search"></i> Detail {{ $page->title }}');
    getNotification();
</script>
