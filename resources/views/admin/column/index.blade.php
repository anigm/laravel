@extends('admin.column.layout')
@section('pageheader')
    <link media="all" href="{{ asset('app.css') }}" rel="stylesheet" type="text/css"/>
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 后台 <span>栏目列表</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">当前地址:</span>
            <ol class="breadcrumb">
                <li class="active">栏目列表</li>
            </ol>
        </div>
    </div>
@endsection
@section('body')
    <p>请选择一个类别从菜单到右边。.</p>
@overwrite