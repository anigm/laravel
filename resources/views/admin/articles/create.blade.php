@extends('layouts.admin-app')
@section('pageheader')
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 后台 <span>添加文章</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">当前地址:</span>
            <ol class="breadcrumb">
                <li class="active">添加文章</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <div class="box">
        <div class="box-body">
            {!! Form::open( array('url' => route('admin.article.store'), 'method' => 'post') ) !!}
            <div class="form-group">
                <div class="col-md-6">
                    <label>标题</label>
                    <span class="require">(*)</span>
                    <input name="title" class="form-control title" placeholder="请输入标题">
                </div>
            </div>

            <div class="form-group">
                <label>内容</label>
                <span class="require">(*)</span>
                <div class="editor">
                    @include('editor::head')
                    {!! Form::textarea('content', '', ['class' => 'form-control','id'=>'myEditor']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    {!! Form::label('tag_list', '标签：') !!}
                    {!! Form::select('tag_list[]',$tags,null,['id' => 'tag_list','class' => 'form-control','multiple']) !!}
                </div>
            </div>
            <input type="hidden" name="user_id" value="{{Auth::guard('admin')->user()->id}}">
            <div class="form-group">
                <div class="col-md-4">
                    <span class="btn-space">
                        <input class="btn btn-primary" type="submit" name="submit" value="提交">
                    </span>
                </div>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
@endsection
