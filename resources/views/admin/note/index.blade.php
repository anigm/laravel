@extends('layouts.admin-app')
@section('pageheader')
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 后台 <span>文章列表</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">当前地址:</span>
            <ol class="breadcrumb">
                <li class="active">文章列表</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <div class="box">
        <div class="box-body">
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>标题</th>
                    <th>分类</th>
                    <th>作者</th>
                    <th>更新时间</th>
                    <th>操作</th>
                </tr>
                @foreach($datas as $key=>$data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td><a href="{{url('/note/'.$data->id)}}" target="_blank">{{ $data->title }}</a></td>
                        <td>{{$category_name[$key]}}</td>
                        <td>{{ $data->user['name']}}</td>
                        <td>{{ $data->updated_at }}</td>
                        <td>
                            <a href="{{ url('admin/note/'.$data->id.'/edit')  }}" class="btn btn-info btn-primary btn-sm iframe cboxElement"><span class="glyphicon glyphicon-pencil"></span> 编辑</a>
                            <a href="{{ url('admin/note/destroy/'.$data->id)  }}" class="btn btn-info btn-danger btn-sm iframe cboxElement"><span class="glyphicon glyphicon-trash"></span> 回收站</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="box-footer clearfix">
            <div class="pull-right">
                {!! $datas->render() !!}
            </div>
        </div>
    </div>
@endsection