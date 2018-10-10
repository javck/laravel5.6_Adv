@extends('layouts.backend')
@section('title','分類列表')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <button onclick="javascript:location.href='{{url("/backend/cgy/create")}}'">建立新分類</button>
    <div class="box-body">
        <table id="tb_cgys" class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>流水號</th>
                    <th>名稱</th>
                    <th>圖片</th>
                    <th>圖片網址</th>
                    <th>商品數</th>
                    <th>更新日期</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cgys as $cgy)
                    <tr>
                        <!-- 流水號 id -->
                        <td> <a href="{{url('backend/cgy/'.$cgy->id.'/edit')}}">{{ $cgy->id }}</a></td>

                        <!-- 分類名稱 name -->
                        <td> {{ $cgy->name }}</td>

                        <!-- 分類圖片 pic ，如果是http或https開頭的網址就直接使用，否則為內部資源路徑使用asset來生成-->
                        @if(substr( $cgy->pic, 0, 4 ) === "http" || substr( $cgy->pic, 0, 5 ) === "https")
                            <td> <img src="{{$cgy->pic}}" style="width:120px"></td>
                        @else
                            <td> <img src="{{asset($cgy->pic)}}" style="width:120px"></td>
                        @endif

                        <!-- 圖片網址 url -->
                        <td> <a href="{{$cgy->url}}">{{$cgy->url}}</a></td>

                        <!-- 分類商品數 -->
                        <td> {{$cgy->items()->count() }}</td>

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
            {{-- var table = $('#tb_cgys').DataTable(); --}}
            var table = $('#tb_cgys').DataTable({
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
