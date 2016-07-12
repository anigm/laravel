@extends('layouts.admin-app')
@section('pageheader')
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 后台 <span>友情链接列表</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">当前地址:</span>
            <ol class="breadcrumb">
                <li class="active">友情链接列表</li>
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
        <th>URL</th>
        <th>{{trans('admin.base.image')}}</th>
        <th>{{trans('admin.base.operation')}}</th>
        </tr>
        @foreach($links as $link)
        <tr>
        <td>{{$link->id}}</td>
        <td>{{$link->name}}</td>
        <td>{{$link->url}}</td>
        <td>@if ($link->image)<img src="/{{ $link->image}}" width="20" height="20">@else {{trans('admin.base.No image')}} @endif</td>
        <td>
        <a href="{{ url('admin/link/'.$link->id.'/edit')  }}" class="btn btn-info btn-primary btn-sm iframe cboxElement"><span class="glyphicon glyphicon-pencil"></span>{{trans('admin.base.edit')}}</a>
        <a href="{{ url('admin/link/destroy/'.$link->id)  }}" class="btn btn-info btn-danger btn-sm iframe cboxElement"><span class="glyphicon glyphicon-trash"></span>{{trans('admin.base.recycle')}}</a>
        </td>
        </tr>
        @endforeach
        </table>
        </div>
    </div>
@endsection
