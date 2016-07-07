@extends('layouts.admin-app')
@section('pageheader')
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 后台 <span>修改栏目</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">当前地址:</span>
            <ol class="breadcrumb">
                <li class="active">修改栏目</li>
                <li class="active">{{ $column->title }}</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <div class="box">
        <div class="box-body">
            {!! Form::model($column, [ 'route' => [ 'admin.column.update', $column->getKey() ], 'method' => 'PATCH' ]) !!}
            @include('admin.column.partials.form')
            <div class="form-group">
                {!! Form::submit('Save', [ 'class' => 'btn btn-primary' ]) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@overwrite