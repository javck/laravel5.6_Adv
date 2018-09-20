@extends('layouts.backend')
@section('title','分類列表')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">

    <div class="box-body">
        <table id="tb_cgys" class="table table-bordered" style="width:100%">
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
                "pageLength": 10,
                "scrollCollapse": true,
                "paging":   true,
                "dom": '<"top"flp<"clear">>rt<"bottom"ifp<"clear">>',
                "stateSave": true,
            });

        });
    </script>
@stop