@extends('layouts.backend')
@section('title','分類列表')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">

    <div class="box-body">
        <table id="tb_cgys" class="table table-bordered" width="100%">
            <thead>
                <tr>
                    <th>流水號</th>
                    <th>名稱</th>
                    <th>圖片</th>
                    <th>圖片網址</th>
                    <th>更新日期</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cgys as $cgy)
                    <tr>
                        <!-- 流水號 id -->
                        <td> <a href="{{url('backend/cgys/'.$cgy->id.'/edit')}}">{{ $cgy->id }}</a></td>

                        <!-- 分類名稱 name -->
                        <td> {{ $cgy->name }}</td>

                        <!-- 分類圖片 pic -->
                        <td> <img src="{{$cgy->pic}}"></td>

                        <!-- 圖片網址 url -->
                        <td> <a href="{{$cgy->url}}">{{$cgy->url}}</a></td>

                        <!-- 更新時間 -->
                        <td>{{ $cgy->updated_at->format('Y/m/d H:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </section>

@stop

@section('js')
    <script>
        $(document).ready(function() 
        {
            var table = $('#tb_cgys').DataTable();

        });
    </script>
@stop