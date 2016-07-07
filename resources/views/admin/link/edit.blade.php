@extends('layouts.admin-app')
@section('pageheader')
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 后台 <span>修改友情链接</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">当前地址:</span>
            <ol class="breadcrumb">
                <li class="active">修改友情链接</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-body content-form">
            <div class="col-lg-12">
                {!! Form::open( array('url' => route('admin.link.update',$links->id), 'method' => 'put', 'files'=>true)) !!}
                <div class="control-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                    <label class="control-label" for="name">名称</label>
                    <div class="controls"> {!! Form::text('name', $links->name, array('class'=>'form-control', 'id' => 'name', 'placeholder'=>'名称')) !!}
                        @if ($errors->first('name')) <span class="help-block">{!! $errors->first('name') !!}</span> @endif
                    </div>
                </div>
                <br>
                <div class="control-group {!! $errors->has('url') ? 'has-error' : '' !!}">
                    <label class="control-label" for="url">URL</label>
                    <div class="controls"> {!! Form::text('url', $links->url, array('class'=>'form-control', 'id' => 'url', 'placeholder'=>'url')) !!}
                        @if ($errors->first('url')) <span class="help-block">{!! $errors->first('url') !!}</span> @endif
                    </div>
                </div>
                <br>
                <script src="{{ asset('plugin/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
                <link media="all" href="{{ asset('plugin/jasny-bootstrap/css/jasny-bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
                <div class="fileinput fileinput-new control-group {!! $errors->has('image') ? 'has-error' : '' !!}" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                        @if ($links->image)<img src="/{{ $links->image}}"> @endif
                    </div>
                    <div>
                <span class="btn btn-default btn-file">
                    <span class="fileinput-new">图片</span>
                    <span class="fileinput-exists">重选</span>
                    {!! Form::file('image', null, array('class'=>'form-control', 'id' => 'image', 'placeholder'=>'Image')) !!}
                    @if ($errors->first('image')) <span class="help-block">{!! $errors->first('image') !!}</span> @endif
                </span>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">移除</a><a href="#" class="btn btn-default">尺寸&nbsp;200*200</a>
                    </div>
                <br>
                    {!! Form::hidden('hiddenimg', $links->image, array('id' => 'hiddenimg')) !!}
                    {!! Form::submit('提交', array('class' => 'btn btn-success')) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
@endsection




