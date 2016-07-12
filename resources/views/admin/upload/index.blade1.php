@extends('layouts.admin-app')
@section('pageheader')
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 后台 <span>文件管理</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">当前地址:</span>
            <ol class="breadcrumb">
                <li class="active">文件管理</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row page-title-row" style="padding-top: 12px;">
            <div class="col-md-6">
                <div class="pull-left">
                    <ul class="breadcrumb">
                        @foreach ($breadcrumbs as $path => $disp)
                            <li><a href="/admin/upload?folder={{ $path }}">{{ $disp }}</a></li>
                        @endforeach
                        <li class="active">{{ $folderName }}</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 text-right">
                <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#modal-folder-create">
                    <i class="fa fa-plus-circle"></i> {{trans('admin.upload.Create directory')}}
                </button>
                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal-file-upload">
                    <i class="fa fa-upload"></i> {{trans('admin.upload.upload')}}
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="uploads-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>{{trans('admin.base.name')}}</th>
                        <th>{{trans('admin.upload.file type')}}</th>
                        <th>{{trans('admin.base.Create date')}}</th>
                        <th>{{trans('admin.upload.file size')}}</th>
                        <th data-sortable="false">{{trans('admin.base.operation')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- 子目录 --}}
                    @foreach ($subfolders as $path => $name)
                        <tr>
                            <td><a href="/admin/upload?folder={{ $path }}"><i class="fa fa-folder fa-lg fa-fw"></i>{{ $name }}</a></td>
                            <td>Folder</td>
                            <td>-</td>
                            <td>-</td>
                            <td><button type="button" class="btn btn-xs btn-danger" onclick="delete_folder('{{ $name }}')"><i class="fa fa-times-circle fa-lg"></i>{{trans('admin.base.del')}}</button></td>
                        </tr>
                    @endforeach
                    {{-- 所有文件 --}}
                    @foreach ($files as $file)
                    <tr>
                    <td>
                    <a href="{{ $file['webPath'] }}">
                        @if (is_image($file['mimeType']))<i class="fa fa-file-image-o fa-lg fa-fw"></i>
                        @else<i class="fa fa-file-o fa-lg fa-fw"></i>@endif
                        {{ $file['name'] }}
                    </a>
                    </td>
                    <td>{{ $file['mimeType'] or 'Unknown' }}</td>
                    <td>{{ $file['modified']->format('j-M-y g:ia') }}</td>
                    <td>{{ human_filesize($file['size']) }}</td>
                    <td>
                        <button type="button" class="btn btn-xs btn-danger" onclick="delete_file('{{ $file['name'] }}')">
                            <i class="fa fa-times-circle fa-lg"></i>{{trans('admin.base.del')}}
                        </button>
                        @if (is_image($file['mimeType']))
                            <button type="button" class="btn btn-xs btn-success" onclick="preview_image('{{ $file['webPath'] }}')">
                                <i class="fa fa-eye fa-lg"></i>{{trans('admin.base.browse')}}
                            </button>
                        @endif
                        @if (is_download_file($file['mimeType']))
                            <button type="button" class="btn btn-xs btn-success" onclick="download_file('{{ $file['webPath'] }}')">
                                <i class="fa fa-eye fa-lg"></i>{{trans('admin.base.download')}}
                            </button>
                        @endif
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.upload._modals')
@stop
@section('scripts')
    <script>
        // 确认文件删除
        function delete_file(name)
        {
            $("#delete-file-name1").html(name);
            $("#delete-file-name2").val(name);
            $("#modal-file-delete").modal("show");
        }
        // 确认目录删除
        function delete_folder(name)
        {
            $("#delete-folder-name1").html(name);
            $("#delete-folder-name2").val(name);
            $("#modal-folder-delete").modal("show");
        }
        // 预览图片
        function preview_image(path)
        {
            $("#preview-image").attr("src", path);
            $("#modal-image-view").modal("show");
        }
        // 下载文件
        function download_file(path)
        {
            $("#preview-download").attr("href", path);
            //获取斜杠最后一次出现的位置
            var download_n = path.lastIndexOf("/");
            var download_filename=path.substring(download_n+1);
            $("#preview-download").append(download_filename);
            $("#modal-download-view").modal("show");
        }
//         初始化数据
//        $(function()
//        {
//        });
    </script>
@stop