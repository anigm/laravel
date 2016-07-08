{{-- 创建目录 --}}
<div class="modal fade" id="modal-folder-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="/admin/upload/folder" class="form-horizontal">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="folder" value="{{ $folder }}">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal">×</button><h4 class="modal-title">创建文件夹</h4></div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="new_folder_name" class="col-sm-3 control-label">文件夹名称</label>
                        <div class="col-sm-8"><input type="text" id="new_folder_name" name="new_folder" class="form-control"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">创建目录</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- 删除文件 --}}
<div class="modal fade" id="modal-file-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal">×</button><h4 class="modal-title">文件删除</h4></div>
            <div class="modal-body"><p class="lead"><i class="fa fa-question-circle fa-lg"></i>你确定要删除<kbd><span id="delete-file-name1">file</span></kbd>这个文件吗?</p></div>
            <div class="modal-footer">
                <form method="POST" action="/admin/upload/file">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="folder" value="{{ $folder }}">
                    <input type="hidden" name="del_file" id="delete-file-name2">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-danger">删除文件</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- 删除目录 --}}
<div class="modal fade" id="modal-folder-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal">×</button><h4 class="modal-title">目录删除</h4></div>
            <div class="modal-body"><p class="lead"><i class="fa fa-question-circle fa-lg"></i>你确定要删除<kbd><span id="delete-folder-name1">folder</span></kbd>这个目录吗?</p></div>
            <div class="modal-footer">
                <form method="POST" action="/admin/upload/folder">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="folder" value="{{ $folder }}">
                    <input type="hidden" name="del_folder" id="delete-folder-name2">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-danger">删除目录</button>
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
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal">×</button><h4 class="modal-title">上传文件</h4></div>
                <div class="modal-body">
                    <div class="form-group"><label for="file" class="col-sm-3 control-label">文件浏览</label><div class="col-sm-8"><input type="file" id="file" name="file"></div></div>
                    <div class="form-group"><label for="file_name" class="col-sm-3 control-label">自定义文件名</label><div class="col-sm-4"><input type="text" id="file_name" name="file_name" class="form-control"></div></div>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">取消</button><button type="submit" class="btn btn-primary">上传</button></div>
            </form>
        </div>
    </div>
</div>
{{-- 浏览图片 --}}
<div class="modal fade" id="modal-image-view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal">×</button><h4 class="modal-title">图片浏览</h4></div>
            <div class="modal-body"><img id="preview-image" class="img-responsive center-block"></div>
            <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">取消</button></div>
        </div>
    </div>
</div>
{{-- 下载文件 --}}
<div class="modal fade" id="modal-download-view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal">×</button><h4 class="modal-title">下载文件</h4></div>
            <div class="modal-body"><a id="preview-download" title="下载文件" class="img-responsive"></a></div>
            <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">取消</button></div>
        </div>
    </div>
</div>