@extends('layouts.admin-app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>
                    栏目
                    <small>
                        <a href="" title="Create new root category">
                            <a href="{{ route('admin.column.create') }}" title="创建栏目">
                            添加<span class="glyphicon glyphicon-plus"></span>
                        </a>
                    </small>
                </h2>
                @include('admin.column.partials.tree')
            </div>
            <div class="col-md-6">
                <h2>@yield('title')</h2>
                @yield('body')
            </div>
        </div>
    </div>
@overwrite