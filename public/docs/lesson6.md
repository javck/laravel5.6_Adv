# Select2 - jQuery Plugin 套件

> 說明如何使用 Select2 套件來實現豐富的下拉選單功能，如單選.多選.可搜尋選項.動態新增選項等

[Select2 官網說明](https://select2.org/)

## 測試網址

##知識點 1.安裝套件

    Step 0. 確保先前已匯入jQuery函式庫

    Step 1. 匯入CSS和JS檔案，如下：

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    ### 如果使用的是 AdminLTE 皮膚，可直接匯入內含的 CSS 和 JS 檔案，範例如下：
        JS:
        <script src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>

        CSS:
        <link href="{{asset('bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css">

    Step 2.針對select元素呼叫單一函式，指令如下：

    $(document).ready( function () {
        $('.select2').select2();
    } );

##知識點 2.選項設定方法

    可在參數內以物件形式帶入所需參數，如範例:

    var select = $('.select2').select2({
        placeholder: '請選擇'
    });

##知識點 3.相關選項說明

    allowClear          是否出現清除內容的x按鈕，設定值為true/false，預設為false
    closeOnSelect       是否當選取選項後，自動關閉下拉選單，設定值為true/false，預設為true
    data                值為物件陣列，允許利用陣列來渲染選項
    debug               是否顯示除錯訊息，顯示在console，預設為false
    disabled            是否無法被控制，預設為false
    multiple            是否支持多選，預設為false
    placeholder         當未選取任何選項時的提示文字
    tags                是否支持新增選項

##知識點 4.單選輸入項設計

    建議使用Form套件生成輸入項，範例如下，參數依序為：元素name.選項陣列.預設選項.其他屬性陣列
    {!! Form::select('cgy_id', $cgys , null , ['id'=>'cgy_id' , 'class'=> 'form-control']) !!}

    由Controller回傳的選項key.value陣列，作法如下：

    //使用pluck()，回傳所有資料的name和id欄位，以key.value陣列形式
    $cgys = \App\Cgy::pluck('name', 'id');
    return view('items.edit', compact('item', 'cgys'));
