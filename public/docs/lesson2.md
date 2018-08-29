# Laravel Auth

> 說明如何利用 Laravel 自帶的驗證機制，來實現帳密登入.忘記密碼等功能

---

## 知識點 1.如何啟動 Laravel 內建驗證機制

    TERMINAL$ php artisan make:auth  （將會生成驗證相關視圖檔，以及驗證路由規則)

    登入路徑 /login
    註冊路徑 /register

## 知識點 2.如何針對路由設定驗證機制

    透過路由設定：

        Route::get('/backend','SiteController@renderDashboard')->middleware('auth');

    透過Controller建構子設定：

        public function __construct()
        {
            $this->middleware('auth'); //這個控制器的所有方法都需要通過驗證
        }
