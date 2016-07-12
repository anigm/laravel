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
                    <th>{{trans('admin.base.title')}}</th>
                    <th>{{trans('admin.base.author')}}</th>
                    <th>{{trans('admin.base.Update time')}}</th>
                    <th>{{trans('admin.base.operation')}}</th>
                </tr>
                @foreach($datas as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td><a href="#">{{ $data->title }}</a></td>
                        <td><a href="#">{{ $data->user['name']}}</a></td>
                        <td>{{ $data->updated_at }}</td>
                        <td>
                            <a href="{{ url('admin/note/restore/'.$data->id)  }}" class="btn btn-info btn-primary btn-sm iframe cboxElement"><span class="glyphicon glyphicon-pencil"></span>{{trans('admin.base.recovery')}}</a>
                            <a href="{{ url('admin/note/delete/'.$data->id)  }}" class="btn btn-info btn-danger btn-sm iframe cboxElement"><span class="glyphicon glyphicon-trash"></span>{{trans('admin.base.Remove')}}</a>
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