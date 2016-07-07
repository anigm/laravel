@extends('layouts.admin-app')
@section('pageheader')
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 后台 <span>创建栏目</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">当前地址:</span>
            <ol class="breadcrumb">
                <li class="active">创建栏目</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <div class="box">
        <div class="box-body">
    {!! Form::model($data, [ 'route' => 'admin.column.store' ]) !!}
        @include('admin.column.partials.form')
        <div class="form-group">
            {!! Form::submit('添加', [ 'class' => 'btn btn-primary' ]) !!}
        </div>
    {!! Form::close() !!}
    </div>
    </div>
@overwrite