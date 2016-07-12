{{-- 创建目录 --}}
<div class="modal fade" id="modal-folder-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="/admin/upload/folder" class="form-horizontal">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="folder" value="{{ $folder }}">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal">×</button><h4 class="modal-title">{{trans('admin.upload.create folder')}}</h4></div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="new_folder_name" class="col-sm-3 control-label">{{trans('admin.upload.Folder name')}}</label>
                        <div class="col-sm-8"><input type="text" id="new_folder_name" name="new_folder" class="form-control"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.base.cancel')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('admin.upload.Create directory')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- 删除文件 --}}
<div class="modal fade" id="modal-file-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal">×</button><h4 class="modal-title">{{trans('admin.upload.File delete')}}</h4></div>
            <div class="modal-body"><p class="lead"><i class="fa fa-question-circle fa-lg"></i>{{trans('admin.upload.Are you sure you want to delete')}}<kbd><span id="delete-file-name1">file</span></kbd>{{trans('admin.upload.This file?')}}</p></div>
            <div class="modal-footer">
                <form method="POST" action="/admin/upload/file">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="folder" value="{{ $folder }}">
                    <input type="hidden" name="del_file" id="delete-file-name2">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.base.cancel')}}</button>
                    <button type="submit" class="btn btn-danger">{{trans('admin.upload.Delete file')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- 删除目录 --}}
<div class="modal fade" id="modal-folder-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal">×</button><h4 class="modal-title">{{trans('admin.upload.Directory delete')}}</h4></div>
            <div class="modal-body"><p class="lead"><i class="fa fa-question-circle fa-lg"></i>{{trans('admin.upload.Are you sure you want to delete')}}<kbd><span id="delete-folder-name1">folder</span></kbd>{{trans('admin.upload.This directory?')}}</p></div>
            <div class="modal-footer">
                <form method="POST" action="/admin/upload/folder">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="folder" value="{{ $folder }}">
                    <input type="hidden" name="del_folder" id="delete-folder-name2">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.base.cancel')}}</button>
                    <button type="submit" class="btn btn-danger">{{trans('admin.upload.Delete directory')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- 上传文件 --}}
<div class="modal fade" id="modal-file-upload">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="/admin/upload/file" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="folder" value="{{ $folder }}">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal">×</button><h4 class="modal-title">{{trans('admin.upload.Upload files')}}</h4></div>
                <div class="modal-body">
                    <div class="form-group"><label for="file" class="col-sm-3 control-label">{{trans('admin.upload.File browsing')}}</label><div class="col-sm-8"><input type="file" id="file" name="file"></div></div>
                    <div class="form-group"><label for="file_name" class="col-sm-3 control-label">{{trans('admin.upload.Custom file name')}}</label><div class="col-sm-4"><input type="text" id="file_name" name="file_name" class="form-control"></div></div>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.base.cancel')}}</button><button type="submit" class="btn btn-primary">{{trans('admin.upload.upload')}}</button></div>
            </form>
        </div>
    </div>
</div>
{{-- 浏览图片 --}}
<div class="modal fade" id="modal-image-view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal">×</button><h4 class="modal-title">{{trans('admin.upload.Picture browsing')}}</h4></div>
            <div class="modal-body"><img id="preview-image" class="img-responsive center-block"></div>
            <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.base.cancel')}}</button></div>
        </div>
    </div>
</div>
{{-- 下载文件 --}}
<div class="modal fade" id="modal-download-view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal">×</button><h4 class="modal-title">{{trans('admin.base.Download File')}}</h4></div>
            <div class="modal-body"><a id="preview-download" title="{{trans('admin.base.Download File')}}" class="img-responsive"></a></div>
            <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.base.cancel')}}</button></div>
        </div>
    </div>
</div>