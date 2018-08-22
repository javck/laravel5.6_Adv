# Laravel5.6 環境設置

Step0.XAMPP 整合包安裝和 Laravel 框架安裝請參考入門班內容
Step1.如為 Mac 環境，請開啟專案的 storage 和 bootstrap 這兩個資料夾權限為 777 (sudo chmod -R 777 storage)
Step2.建立.env 檔案，生成 APP_KEY (php artisan key:generate)
Step3.設定.env 檔案的相關內容，如範例
Step4.設定 confing/app.php 的相關內容，如範例

\*\*Laravel 官網

. [https://laravel.com/](https://laravel.com/)
. [https://adminlte.io/themes/AdminLTE/pages/UI/general.html](AdminLTE後台套版)

## 後台頁面請參考 /backend

## 知識點 1 - 資源路徑設置

設置 js.css.image 等檔案的路徑時，可使用 helper function asset()，生成至 public 資料夾路徑的網址，如下例：

<link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}"> (bower_components資料夾位於public之內)

## 知識點 2 - views 子資料夾規劃

    layouts 用於存放父視圖
    partials 用於存放被include的部分視圖
    {model}s 各Model的關聯視圖放於各自的資料夾內
