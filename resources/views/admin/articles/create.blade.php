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
                <div class="col-md-6">
                    <label>分类</label>
                    <span class="require">(*)</span>
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach ($categories['top'] as $top_category)
                            <option value="{{ $top_category->id }}"
                                    @if(isset($article->category_id) && $top_category->id == $article->category_id)
                                    selected
                                    @endif
                                    >{{ $top_category->name }}</option>
                            @if(isset($categories['second'][$top_category->id]))
                                @foreach ($categories['second'][$top_category->id] as $scategory)
                                    <option value="{{ $scategory->id }}"
                                            @if(isset($article->category_id) && $scategory->id == $article->category_id)
                                            selected
                                            @endif
                                            >&nbsp;&nbsp;&nbsp;{{ $scategory->name }}</option>
                                @endforeach
                            @endif
                        @endforeach
                    </select>
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
