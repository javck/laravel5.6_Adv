# Laravel5.6 環境設置

Step0.XAMPP 整合包安裝和 Laravel 框架安裝請參考入門班內容
Step1.如為 Mac 環境，請開啟專案的 storage 和 bootstrap 這兩個資料夾權限為 777 (sudo chmod -R 777 storage)
Step2.建立.env 檔案，生成 APP_KEY (php artisan key:generate)
Step3.設定.env 檔案的相關內容，如範例
Step4.設定 confing/app.php 的相關內容，如範例
Step5.請切換到 Terminal，執行 composer install 來下載套件

\*\*Laravel 官網

. [https://laravel.com/](https://laravel.com/)
. [https://adminlte.io/themes/AdminLTE/pages/UI/general.html](AdminLTE後台套版)
. [https://bit.ly/2MCaOFS](Envato Canvas 前台套版)
. [https://github.com/javck/laravel5.6_Adv](專案Github版本庫)

## 後台頁面請參考 /backend

### 知識點 1 - 資源路徑設置

設置 js.css.image 等檔案的路徑時，可使用 helper function asset()，生成至 public 資料夾路徑的網址，如下例：

<link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}"> (bower_components資料夾位於public之內)

### 知識點 2 - views 子資料夾規劃

    layouts 用於存放父視圖
    partials 用於存放被include的部分視圖
    {model}s 各Model的關聯視圖放於各自的資料夾內

### 知識點 3 - Blade 頁面繼承與匯入

    被繼承的父Blade統一存放於views/layouts資料夾

    繼承語法為@extends(父Blade路徑)

    被匯入的片段Blade統一存放於views/partials資料夾

    匯入語法為@include(父Blade路徑)

### 知識點 4 - Blade 挖洞與填洞

    @yield(洞名) 用於父Blade，將需由子Blade實作部分挖洞並命名

    @section(洞名) 用於繼承的子Blade，說明該區域實作是在填父Blade的哪個洞

## 前台頁面請參考 /shop

範例 html 檔案路徑 /demo_shop.html(位於 public/demo_shop.html)
