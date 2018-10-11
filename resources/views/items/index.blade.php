@extends('layouts.backend')
@section('title','分類列表')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">

    <div class="box-body">
        <table id="tb_item" class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>流水號</th>
                    <th>名稱</th>
                    <th>分類</th>
                    <th>價格</th>
                     <th>圖片</th>
                    <th>更新日期</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <!-- 流水號 id -->
                        <td> <a href="{{url('backend/itme/'.$item->id.'/edit')}}">{{ $item->id }}</a></td>

                        <!-- item name -->
                        <td> {{ $item->name }}</td>
 
                        <!-- cgy id  -->
                        <td> {{ $item->cgy_id }}</td>

                        <!-- password url -->
                        <td> {{$item->price}}</td>

                        <!-- 圖片 -->
                        <td><img src="{{$item->pic}}"></td>


                        <!--· 更新時間 -->
                        <td>{{ $item->updated_at->format('Y/m/d H:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </section>

@stop

@section('js')
    <script>
        $(document).ready( function(){
        	console.log('datatable');
         	var table = $('#tb_item').DataTable();
        } );
    </script>
@stop