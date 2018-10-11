@extends('layouts.backend')
@section('title','分類列表')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">

    <div class="box-body">
        <table id="tb_users" class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>流水號</th>
                    <th>名稱</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>更新日期</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <!-- 流水號 id -->
                        <td> <a href="{{url('backend/user/'.$user->id.'/edit')}}">{{ $user->id }}</a></td>

                        <!-- user name -->
                        <td> {{ $user->name }}</td>

                        <!-- user email  -->
                        <td> <a href="mailto:{{$user->email}}">{{$user->email}}"></a></td>

                        <!-- password url -->
                        <td> {{$user->password}}</td>

                        <!-- 更新時間 -->
                        <td>{{ $user->updated_at->format('Y/m/d H:i:s') }}</td>
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
         	var table = $('#tb_users').DataTable();
        } );
    </script>
@stop