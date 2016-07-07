@extends('layouts.admin-app')
@section('pageheader')
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 后台 <span>博客列表</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">当前地址:</span>
            <ol class="breadcrumb">
                <li class="active">博客列表</li>
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
                    <th>栏目</th>
                    <th>标题</th>
                    <th>图片</th>
                    <th>时间</th>
                    <th>操作</th>
                </tr>
                @foreach($blogs as $blog)
                    <tr>
                        <td>{{$blog->id}}</td>
                        <td>{{ $blog->column->title}}</td>
                        <td><a href="{{url('/list/'.$blog->id)}}" target="_blank">{{ $blog->title }}</a></td>
                        <td><a href="#"><img src="{{ $blog->image}}" width="20" height="20"></a></td>
                        <td>{{ $blog->datetime }}</td>
                        <td>
                            <a href="{{ url('admin/blog/'.$blog->id.'/edit')  }}" class="btn btn-info btn-primary btn-sm iframe cboxElement"><span class="glyphicon glyphicon-pencil"></span> 编辑</a>
                            <a href="{{ url('admin/blog/destroy/'.$blog->id)  }}" class="btn btn-info btn-danger btn-sm iframe cboxElement"><span class="glyphicon glyphicon-trash"></span> 回收站</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="box-footer clearfix">
            <div class="pull-right">
                {!! $blogs->render() !!}
            </div>
        </div>
    </div>
@endsection