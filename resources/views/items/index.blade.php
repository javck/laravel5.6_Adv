@extends('layouts.backend')
@section('title','商品列表')
@section('content')
    <section class="content-header">
    <button onclick="javascript:location.href='{{url("/backend/item/create")}}'">建立新商品</button>
    <div class="box-body">
        <table id="tb_items" class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>流水號</th>
                    <th>分類</th>
                    <th>名稱</th>
                    <th>圖片</th>
                    <th>價格</th>
                    <th>建立日期</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <!-- 流水號 id -->
                        <td> <a href="{{url('backend/item/'.$item->id.'/edit')}}">{{ $item->id }}</a></td>

                        <!-- 商品名稱 name -->
                        <td> {{ $item->name }}</td>

                        <!-- 分類名稱 cgy_id -->
                        <td> {{ $item->cgy->name }}</td>

                        <!-- 商品圖片 pic ，如果是http或https開頭的網址就直接使用，否則為內部資源路徑使用asset來生成-->
                        @if(substr( $item->pic, 0, 4 ) === "http" || substr( $item->pic, 0, 5 ) === "https")
                            <td> <img src="{{$item->pic}}" style="width:120px"></td>
                        @else
                            <td> <img src="{{asset($item->pic)}}" style="width:120px"></td>
                        @endif

                        <!-- 價格 price -->
                        <td> {{$item->price}}</td>

                        <!-- 建立時間 -->
                        <td>{{ $item->created_at->format('Y/m/d H:i:s') }}</td>
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
            var table = $('#tb_items').DataTable({
                "language":
                {
                    "decimal":        "",
                    "emptyTable":     "沒有任何搜尋紀錄",
                    "info":           "顯示 _START_ / _END_ 全部有 _TOTAL_ 筆資料",
                    "infoEmpty":      "顯示 0 / 0 全部有 0 筆資料",
                    "infoFiltered":   "(filtered from _MAX_ total entries)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "顯示 _MENU_ 筆資料",
                    "loadingRecords": "搜尋中...",
                    "processing":     "處理中...",
                    "search":         "搜尋:",
                    "zeroRecords":    "沒有任何資料",
                    "paginate":
                    {
                        "first":      "第一頁",
                        "last":       "最後一頁",
                        "next":       "下一頁",
                        "previous":   "上一頁"
                    },
                    "aria":
                    {
                            "sortAscending":  ": activate to sort column ascending",
                            "sortDescending": ": activate to sort column descending"
                    }
                    },
                "order":[],
                // rowReorder: 
                // {
                //     selector: 'td:nth-child(2)'
                // },
                "responsive": true,
                "pageLength": 25,
                "scrollCollapse": true,
                "paging":   true,
                "dom": '<"top"flp<"clear">>rt<"bottom"ifp<"clear">>',
                "stateSave": true,
                 "order": [5, 'desc'],
            });

        });
    </script>
@stop
