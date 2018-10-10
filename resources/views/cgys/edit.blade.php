@extends('layouts.backend')
@section('title','編輯分類')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="col-sm-12">
            <a class="btn btn-success btn-rounded" href="{{ url('/backend/cgy') }}">返回新分類列表 </a><br><br>
            {{ Form::model($cgy,['method'=>'patch','url'=>'backend/cgy/'.$cgy->id ,'role'=>'form']) }}
            <a class="btn btn-warning btn-rounded" onclick="event.preventDefault();document.getElementById('delete-form').submit();">刪除分類</a><br><br>
                @include('cgys._form',['submitBtnText'=>'修改'])
            {{ Form::close() }}
            <form id="delete-form" action="{{ url('/backend/cgy') }}" method="delete" style="display: none;">
                {{ Form::hidden('id', $cgy->id) }}
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