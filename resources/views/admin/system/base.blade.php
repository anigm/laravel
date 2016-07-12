@extends('layouts.admin-app')
@section('pageheader')
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 后台 <span>添加标签</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">当前地址:</span>
            <ol class="breadcrumb">
                <li class="active">添加标签</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-body content-form">
            <div class="col-lg-12">
            {!! Form::open(array('url' => route('admin.system.edit'), 'method' => 'post')) !!}
            @foreach($datas as $key=>$value)
            <div class="form-group">
                <label>{{ trans('system.base.'.$value[0])}}</label>
                <span class="require"></span>
                @if($value[1]=='true' or $value[1]=='false')
                    <select name="{{$value[1]}}" class="form-control">
                        <option value='true' @if($value[1]=='true') selected @endif>开启</option>
                        <option value='false' @if($value[1]=='false') selected @endif>关闭</option>
                    </select>
                @elseif($value[0]=='timezone' || $value[0]=='fallback_locale' || $value[0]=='DB_HOST' || $value[0]=='DB_DATABASE' || $value[0]=='DB_USERNAME' || $value[0]=='DB_PASSWORD')
                    <input name="{{$value[0]}}" readonly value="{{$value[1]}}" class="form-control title" placeholder="请输入标签">
                @elseif($value[0]=='locale')
                    <select name="{{$value[1]}}" class="form-control">
                        <option value='zh-CN' @if($value[1]=='zh-CN') selected @endif>zh-CN</option>
                        <option value='en' @if($value[1]=='en') selected @endif>en</option>
                    </select>
                @elseif($value[0]=='myedit')
                    <select name="{{$value[1]}}" class="form-control">
                        <option value='ckeditor' @if($value[1]=='ckeditor') selected @endif>ckeditor</option>
                        <option value='mkdown' @if($value[1]=='mkdown') selected @endif>mkdown</option>
                        <option value='ueditor' @if($value[1]=='ueditor') selected @endif>ueditor</option>
                    </select>
                @else
                    <input name="{{$value[0]}}" value="{{$value[1]}}" class="form-control title" placeholder="请输入标签">
                @endif
            </div>
            @endforeach
            <input type="submit" name="submit" class="btn btn-primary" value="提交">
            {!!Form::close()!!}
            </div>
        </div>
    </div>
    </div>
@endsection