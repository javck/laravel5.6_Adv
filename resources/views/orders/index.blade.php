@extends('layouts.backend')
@section('title','分類列表')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">

    <div class="box-body">
        <table id="tb_order" class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>流水號</th>
                    <th>會員</th>
                    <th>狀態</th>
                    <th>備註</th>
                    <th>更新日期</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <!-- 流水號 id -->
                        <td> <a href="{{url('backend/order/'.$order->id.'/edit')}}">{{ $order->id }}</a></td>

                        <!-- 訂單 -->
                        <td> {{  $order->items()->count() }}</td>


 
                        <!-- 狀態  -->
                        <td> {{ $order->status }}</td>

                        <!-- password url -->
                        <td> {{$order->comment}}</td>


                        <!--· 更新時間 -->
                        <td>{{ $order->updated_at->format('Y/m/d H:i:s') }}</td>
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
         	var table = $('#tb_order').DataTable();
        } );
    </script>
@stop