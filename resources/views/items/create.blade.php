@extends('layouts.backend')
@section('title','建立新商品')
@section('content')

    <section class="content-header">
        <div class="col-sm-12">
            <a class="btn btn-success btn-rounded" href="{{ url('/backend/item') }}">返回新商品列表 </a><br><br>
            {{ Form::open(['action'=>'ItemController@store','role'=>'form','files'=>true]) }}
                @include('items._form',['submitBtnText'=>'建立'])
            {{ Form::close() }}
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