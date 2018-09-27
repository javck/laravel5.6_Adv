@extends('layouts.backend')
@section('title','使用者列表')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">

    <div class="box-body">
        <table id="tb_users" class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>流水號</th>
                    <th>名稱</th>
                    <th>電子郵箱</th>
                    <th>密碼</th>
                    <th>電話</th>
                    <th>訂單數</th>
                    <th>更新日期</th>
                    <th>建立日期</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <!-- 流水號 id -->
                        <td> <a href="{{url('backend/user/'.$user->id.'/edit')}}">{{ $user->id }}</a></td>

                        <!-- 使用者名稱 name -->
                        <td> {{ $user->name }}</td>

                        <!-- 電子郵箱 email -->
                        <td> <a href="mailto:{{$user->email}}">{{ $user->email }}</a></td>

                        <!-- 密碼 password -->
                        <td> {{ $user->password }}</td>

                        <!-- 電話 tel -->
                        <td> <a href="tel:{{$user->tel}}">{{$user->tel}}</a></td>

                        <!-- 訂單數 -->
                        <td> @if($user->orders()!=null) {{$user->orders()->count()}} @else 0 @endif</td>

                        <!-- 更新時間 -->
                        <td>{{ $user->updated_at->format('Y/m/d H:i:s') }}</td>

                        <!-- 建立時間 -->
                        <td>{{ $user->created_at->format('Y/m/d h:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </section>
@endsection    

@section('js')
    <script>
        $(document).ready(function() 
        {
            var table = $('#tb_users').DataTable({
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