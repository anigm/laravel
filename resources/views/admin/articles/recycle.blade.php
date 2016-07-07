@extends('layouts.admin-app')
@section('pageheader')
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 后台 <span>回收站</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">当前地址:</span>
            <ol class="breadcrumb">
                <li class="active">回收站</li>
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
                    <th>作者</th>
                    <th>更新时间</th>
                    <th>操作</th>
                </tr>
                @foreach($articles as $article)
                    <tr>
                        <td>{{$article->id}}</td>
                        <td><a href="#">{{ $article->title }}</a></td>
                        <td><a href="#">{{ $article->user['name']}}</a></td>

                        <td>{{ $article->updated_at }}</td>
                        <td>
                            <a href="{{ url('admin/article/restore/'.$article->id)  }}" class="btn btn-info btn-primary btn-sm iframe cboxElement"><span class="glyphicon glyphicon-pencil"></span> 恢复</a>
                            <a href="{{ url('admin/article/delete/'.$article->id)  }}" class="btn btn-info btn-danger btn-sm iframe cboxElement"><span class="glyphicon glyphicon-trash"></span> 彻底删除</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="box-footer clearfix">
            <div class="pull-right">
                {!! $articles->render() !!}
            </div>
        </div>
    </div>
@endsection