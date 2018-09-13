# Laravel Auth

> 說明如何利用 Laravel 自帶的驗證機制，來實現帳密登入.忘記密碼等功能

[Laravel 官網說明](https://laravel.com/docs/5.6/authentication)

---

## 知識點 1.如何啟動 Laravel 內建驗證機制

    TERMINAL$ php artisan make:auth  （將會生成驗證相關視圖檔，以及驗證路由規則)

    登入路徑 /login
    註冊路徑 /register

## 知識點 2.如何針對路由設定驗證機制

    透過路由設定：

        Route::get('/backend','SiteController@renderDashboard')->middleware('auth');

        Route::middleware(['auth'])->group(function () {
            Route::get('/backend/items', function () {
                // Uses auth Middleware
            });

            Route::get('/backend/users', function () {
                // Uses auth Middleware
            });
        });

    透過Controller建構子設定：

        public function __construct()
        {
            $this->middleware('auth'); //這個控制器的所有方法都需要通過驗證
        }

## 知識點 3.自定義登入--變更登入頁面

    //覆寫LoginController.php的showLoginForm()
    public function showLoginForm()
    {
        return view('auth.login2');
    }

## 知識點 4.自定義登入--變更登入時的驗證欄位

    //覆寫LoginController.php的username()
    public function username()
    {
        return 'name';
    }

## 知識點 5.自定義登入--登入後轉址路徑

    //覆寫redirectTo屬性
    protected $redirectTo = '/backend';

    //如果需要商業邏輯判斷，也可以改成覆寫redirectTo()
    protected function redirectTo()
    {
        return '/path';
    }

## 知識點 6.自定義註冊--變更註冊頁面

    //覆寫RegisterController.php的showRegistrationForm()
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

## 知識點 7.增加註冊的欄位

    1. 變更註冊頁面，加入輸入項
    2. 修改users表格的migration檔案，加入所需要的欄位
    3. 修改Model類別 User的$fillable屬性，加入新欄位
    4. 修改 app/Http/Controllers/Auth/RegisterController裡頭的create()

## 知識點 8.Auth 靜態方法

    Auth::user() //取得User物件
    Auth::id() //取得User流水號
    Auth::check() //確認使用者是否已經登入
    Auth::logout() //使用者登出
    Auth::login($user) //以此User物件登入

## 知識點 9.如何製作登出功能

    logout從5.3版本之後就從get改成post，代表不能只是用超連結就完成登出功能，新的作法如下：

    <a href="#" class="btn btn-default btn-flat" onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a>
    <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: one;">
        {{ csrf_field() }}
    </form>

## (補充)知識點 91.變更重設密碼的 Email 內容

    1. 生成Notification檔案，指令如下：

        php artisan make:notification PasswordReset

    2. 變更app/Notifications/PasswordReset.php的內容如下：

        public $token;

        public function __construct($token)
        {
            $this->token = $token;

        }

        //變更主旨和信件內容
        public function toMail($notifiable)
        {
            return (new MailMessage)
                        ->subject('Email主旨'))
                        ->line('重設密碼訊息第一行')
                        ->action('重設密碼', url('password/reset',$this->token))
                        ->line('重設密碼訊息第二行');

        }

    3.修改 User Model，加入以下內容：

        public function sendPasswordResetNotification($token)
        {
            $this->notify(new ReminderNotification($token));
        }

        PS：需載入Notifiable Class並使用，否則會出現以下錯誤 Call to undefined method

        作法是在User Model加入以下內容：
        ...
        use Illuminate\Notifications\Notifiable;
        use App\Notifications\PasswordReset;
        class User extends Authenticatable
        {
            use Notifiable;
            …

    4.覆寫視圖 Layout，需複製原始視圖到 resources 資料夾，指令如下：

        php artisan vendor:publish

    5.編輯視圖檔/resources/views/vendor/notifications
