@extends('layouts.backend')
@section('title','建立新分類')
@section('content')

    <section class="content-header">
        <div class="col-sm-12">
            <a class="btn btn-success btn-rounded" href="{{ url('/backend/cgy') }}">返回新分類列表 </a><br><br>
            {{ Form::open(['action'=>'CgyController@store','role'=>'form']) }}
                @include('cgys._form',['submitBtnText'=>'建立'])
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