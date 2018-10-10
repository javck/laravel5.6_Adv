# CRUD - MVC 架構規劃

> 說明如何規劃 Model . View . Controller 來實作 CRUD 功能，讓架構更為彈性

## 測試網址

    http://localhost/laravel5.6_Adv/public/backend/cgy

##知識點 1.安裝&設定 Form Collective 套件

    Step 1. 利用composer安裝laravelcollective套件

        composer require "laravelcollective/html":"^5.4.0"

    Step 2. 在config/app.php加入供應器設定

        'providers' => [
            // ...
            Collective\Html\HtmlServiceProvider::class,
            // ...
        ],

    Step 3. 在config/app.php加入別名設定

        'aliases' => [
            // ...
            'Form' => Collective\Html\FormFacade::class,
            'Html' => Collective\Html\HtmlFacade::class,
            // ...
        ],

##知識點 2.如何組織 View 的 Blade 檔

    建議針對各Model建立專屬的資料夾，再將關聯的Blade檔案存放在裡面，一般分為:

        _form.blade.php    將表單結構抽取存於此檔
        create.blade.php   負責顯示建立新資源頁面
        edit.blade.php     負責顯示編輯舊資源頁面
        index.blade.php    負責顯示多筆資源頁面
        show.blade.php     負責顯示單筆資源頁面

##知識點 3.\_form.blade.php 編寫重點

    1.如果表單預定採用非GET的請求方式，記得要加入CSRF Token，否則會發生錯誤，如下示範：

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    2.此檔案將被create和edit這兩個Blade檔給include，可直接得到他們的變數，不需要傳入。另外也可以直接填他們父Blade的洞。

##知識點 4.create.blade.php 編寫重點

    1.表單內容搬移到_form.blade.php，以便於維護

    2.Form主要的內容如下例所示：

    {{ Form::open(['action'=>'CgyController@store','role'=>'form']) }} //action設定對應的方法
        @include('cgys._form',['submitBtnText'=>'建立']) //如果有參數要帶入include視圖，可用第二參數作為陣列傳入
    {{ Form::close() }}

##知識點 5.edit.blade.php 編寫重點

    1.表單內容搬移到_form.blade.php，以便於維護

    2.Form主要的內容如下例所示：

    //為將資料直接帶入對應輸入項，改用model()，第一參數為資料model。變更資料的預設方法是patch或put，因此要加上method屬性
    {{ Form::model($cgy,['method'=>'patch','url'=>'backend/cgy/'.$cgy->id ,'role'=>'form']) }}
        @include('cgys._form',['submitBtnText'=>'修改'])
    {{ Form::close() }}

##知識點 6.刪除資料的預設方法是 delete，但是超連結的方法是 get，該怎麼讓超連結能觸發 delete 方法呢?

    概念是為其建立一個form表單，然後透過JS來取消超連結的預設行為，並改為送出表單，如下例：

    //刪除超連結，不需放在表單內
    <a onclick="event.preventDefault();document.getElementById('del-form').submit();">刪除分類</a>

    //指定刪除某資料的表單
    <form id="del-form" action="{{ url('/backend/cgy') }}" method="delete" style="display: none;">
        {{ Form::hidden('id', $cgy->id) }}
        {{ csrf_field() }}
    </form>
