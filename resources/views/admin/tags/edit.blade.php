@extends('layouts.admin-app')
@section('pageheader')
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 后台 <span>修改标签</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">当前地址:</span>
            <ol class="breadcrumb">
                <li class="active">修改标签</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-body content-form">
            <div class="col-lg-12">
                {!! Form::open( array('url' => route('admin.tags.update',$tags->id), 'method' => 'put') ) !!}
                <div class="form-group">
                    <label>标题</label>
                    <span class="require">(*)</span>
                    <input name="name" class="form-control title" placeholder="请输入标题" value="{{$tags->name}}">
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="提交">
                {!!Form::close()!!}
            </div>
        </div>
    </div>
@endsection