@extends('layouts.backend')
@section('title','編輯商品')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="col-sm-12">
            <a class="btn btn-success btn-rounded" href="{{ url('/backend/item') }}">返回新商品列表 </a><br><br>
            {{ Form::model($item,['method'=>'patch','url'=>'backend/item/'.$item->id ,'role'=>'form','files'=>true,'enctype'=>"multipart/form-data"]) }}
            <a class="btn btn-warning btn-rounded" onclick="event.preventDefault();document.getElementById('delete-form').submit();">刪除商品</a><br><br>
                @include('items._form',['submitBtnText'=>'修改'])
            {{ Form::close() }}
            <form id="delete-form" action="{{ url('/backend/item') }}" method="delete" style="display: none;">
                {{ Form::hidden('id', $item->id) }}
                {{ csrf_field() }}
            </form>
        </div>  
    </section>

@stop

@section('js')
    <script>
        $(document).ready(function() 
        {
            

        });
    </script>
@stop