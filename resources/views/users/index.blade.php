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
                        <td> @if($user->orders()!=null) {{count($user->orders)}} @else 0 @endif</td>

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
                "paging":   true,
                "pageLength": 25,
                "stateSave":true,
                "dom": '<"top"flp<"clear">>rt<"bottom"ifp<"clear">>',

            });
        });
    </script>
@stop