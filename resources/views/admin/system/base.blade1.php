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
            {!! Form::open( array('url' => route('admin.tags.store'), 'method' => 'post') ) !!}
            @foreach($datas as $key=>$value)
            @foreach($value as $keys=>$values)
                <div class="form-group">
                    <label>{{$keys}}</label>
                    <span class="require">(*)</span>
                    @if(is_bool($values))
                    <select name="name" class="form-control">
                        <option value='true' @if($values==true) selected @endif>是</option>
                        <option value='false' @if($values==false) selected @endif>否</option>
                    </select>
                    @else
                    <input name="name" value="{{$values}}" class="form-control title" placeholder="请输入标签">
                    @endif
                </div>
            @endforeach
            @endforeach
            <input type="submit" name="submit" class="btn btn-primary" value="提交">
            <input type="button" name="del" onclick="deletedata()" id="del" value="删除" class="btn btn-primary">
            {!!Form::close()!!}
            </div>
        </div>
    </div>
    </div>
    <script>
    function deletedata()
    {
        if(confirm("缓存清空？"))
        {
            $.ajax({
                url : "{{ URL::to('admin/system/del') }}",
                type : "post",
                traditional:true,
                data:'',
                //data:{"strorderid[]":strorderid,"strordernum[]":strordernum,"customname":customname,"customphone":customphone,"customaddress":customaddress},
                dataType : "JSON",
                headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success : function(data)
                {
                    if(data.status==1)
                    {
                        alert(data['success']);
                    }
                    else
                    {
                        alert(data['success']);
                    }
                }
            });
        }
    }
    </script>
@endsection