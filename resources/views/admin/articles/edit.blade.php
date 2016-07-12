@extends('layouts.admin-app')
@section('pageheader')
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 后台 <span>修改文章</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">当前地址:</span>
            <ol class="breadcrumb">
                <li class="active">修改文章</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <div class="box">
        <div class="box-body">
            {!! Form::open( array('url' => route('admin.article.update',$article->id), 'method' => 'put') ) !!}
            <div class="form-group row">
                <div class="col-md-6">
                    <label>标题</label>
                    <span class="require">(*)</span>
                    <input name="title" class="form-control title" placeholder="请输入标题" value="{{$article->title}}">
                </div>
            </div>
            <div class="form-group">
                <label>内容</label>
                <span class="require">(*)</span>
                <div class="editor">
                    @include('editor::head')
                    {!! Form::textarea('content', $article->content, ['class' => 'form-control','id'=>'myEditor']) !!}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    {!! Form::label('tag_list', '标签：') !!}
                    <select  id="tag_list" class="form-control" multiple="multiple" name="tag_list[]">
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}"  @if(in_array($tag->id,$article_tags)) selected @endif>{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input type="hidden" name="user_id" value="{{Auth::guard('admin')->user()->id}}">
            <div class="form-group row">
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

