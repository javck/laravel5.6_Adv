# DataTables - jQuery Plugin 套件

> 說明如何使用 DataTable 套件來呈現多筆資料

[DataTables 官網說明](https://datatables.net/)

## 測試網址

    http://localhost/laravel5.6_Adv/public/backend/cgy

##知識點 1.安裝套件

    Step 0. 確保先前已匯入jQuery函式庫

    Step 1. 匯入CSS和JS檔案，如下：

    <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    ### 如果使用的是 AdminLTE 皮膚，可直接匯入內涵的 CSS 和 JS 檔案，範例如下：

        JS:
        <script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

        CSS:
        <link href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css">

    Step 2.針對Table元素呼叫單一函式，指令如下：

    $(document).ready( function () {
        $('#myTable').DataTable();
    } );

##知識點 2.選項設定方法

    可在參數內以物件形式帶入所需參數，如範例:

    var table = $('#tb_cgys').DataTable({ "paging":   true, });

##知識點 3.相關選項說明

    language    設定文字內容
    order       設定排序
    responsive  設定是否支持手機版本
    pageLength  設定每頁資料數量，需與paging設定搭配
    paging      設定是否支援分頁
    dom         DOM元素修改
        EX:以下設定可讓分頁按鈕於上下方都出現
        "dom": '<"top"flp<"clear">>rt<"bottom"ifp<"clear">>'
    stateSave   保存排序和分頁設定

##知識點 4.如何讓欄位隨著視窗大小調整寬度

    請透過設定Table標籤的Style屬性，加入width:100%，如範例：style="width:100%"
