@extends('layouts.admin-app')
@section('pageheader')
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 后台 <span>修改笔记</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">当前地址:</span>
            <ol class="breadcrumb">
                <li class="active">修改笔记</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <div class="box">
        <div class="box-body">
            {!! Form::open( array('url' => route('admin.note.update',$data->id), 'method' => 'put') ) !!}
            <div class="form-group">
                <div class="col-md-6">
                    <label>标题</label>
                    <span class="require">(*)</span>
                    <input name="title" class="form-control title" placeholder="请输入标题" value="{{$data->title}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    <label>分类</label>
                    <span class="require">(*)</span>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="0">无父级</option>
                        @if(count($categories)>0)
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if(isset($data->category_id) && $category->id == $data->category_id) selected @endif>
                                    @for($i=1;$i<=$category->count;$i++)├─ @endfor
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label>内容</label>
                    <span class="require">(*)</span>
                    <div class="editor">
                        <script src="{{ asset('plugin/ckeditor/ckeditor.js') }}"></script>
                        {!! Form::textarea('content', $data->content, array('class'=>'form-control', 'id' => 'description', 'placeholder'=>'Description')) !!}
                        @include('admin.vendor.endCKEditor')
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    {!! Form::label('tag_list', '标签：') !!}
                    <select  id="tag_list" class="form-control" multiple="multiple" name="tag_list[]">
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}" @if(in_array($tag->id,$article_tags)) selected @endif>{{$tag->name}}</option>
                        @endforeach
                    </select>
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

