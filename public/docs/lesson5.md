# DataTables - jQuery Plugin 套件

> 說明如何使用 DataTable 套件來呈現多筆資料

[DataTables 官網說明](https://datatables.net/)

## 測試網址

    http://localhost/laravel5.6_Adv/public/backend/item/1
    http://localhost/laravel5.6_Adv/public/backend/cgy/1
    http://localhost/laravel5.6_Adv/public/backend/user/1
    http://localhost/laravel5.6_Adv/public/backend/order/1

##知識點 1.安裝套件

    Step 0. 確保先前已匯入jQuery函式庫

    Step 1. 匯入CSS和JS檔案，如下：

    <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

### 如果使用的是 AdminLTE 皮膚，可直接匯入內涵的 CSS 和 JS 檔案，範例如下：

    <script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

    Step 2.針對Table元素呼叫單一函式，指令如下：

    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
