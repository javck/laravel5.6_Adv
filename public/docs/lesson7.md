# Middleware 中介層

> 說明如何使用 Laravel 的中介層以在發生某特定狀況前能介入處理，比如當進入某些需要權限的頁面但尚未登入時會自動導到登入頁面。

[Middleware] 官網說明](https://laravel.com/docs/5.6/middleware)

##知識點 1.中介層基本介紹

    中介層提供了一個便利的機制來針對進入你應用程式的請求來進行過濾。例如，Laravel包含了一個中介層用來驗證使用者是否已登入。假如使用者尚未登入，該中介層將會將該使用者導到登入頁。又假如已登入，該中介層就會讓使用者進到受保護的頁面內。

    當然，額外的中介層能夠創造來執行除了驗證以外各類型的任務。一個logging中介層能夠在有請求進來時留下log。

    Laravel框架內建了數個中介層，包含用來驗證登入和CSRF防護的。這些檔案都位於 app/Http/Middleware 資料夾內。

##知識點 2.如何自定義中介層

    Step 1. 在Terminal命令列輸入如下指令：

        php artisan make:middleware CheckAge

    該命令將會生成一個名為 CheckAge 的中介層檔案到app/Http/Middleware 資料夾內。在這個中介層內，我們將只會允許age大於200的請求通過，否則將會被轉回home路徑。

    Step 2. 在handle函式內撰寫要處理的程式內容，內容如下：

    <?php

    namespace App\Http\Middleware;

    use Closure;

    class CheckAge
    {
        /**
        * Handle an incoming request.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \Closure  $next
        * @return mixed
        */
        public function handle($request, Closure $next)
        {
            //假如age屬性≤200就轉回home路徑
            if ($request->age <= 200) {
                return redirect('home');
            }
            //沒有異常，可以繼續前進
            return $next($request);
        }
    }

    如你所見，假如age屬性<=200，中介層將會返回一個轉址命令給client端;否則，請求將得以繼續前進。為了讓請求能更深入應用裡頭，即"通過"之意，是透過呼叫$next()

    你可以將中介層想成是一系列的過濾層。所有的HTTP請求在進入應用前都必須通過這些過濾層，每一層都能夠檢查這些請求，甚至是駁回他們。

##知識點 3.如何決定是在過濾前又或者是過濾後才執行處理作業

    所謂過濾前指的是應用在處理請求前，而過濾後當然指的就是當應用已經處理完請求才執行處理。

    過濾前範例：

    <?php

    namespace App\Http\Middleware;

    use Closure;

    class BeforeMiddleware
    {
        public function handle($request, Closure $next)
        {
            // 將所要執行作業寫在$next()之前

            return $next($request);
        }
    }

    過濾後範例：

    <?php

    namespace App\Http\Middleware;

    use Closure;

    class AfterMiddleware
    {
        public function handle($request, Closure $next)
        {
            $response = $next($request);

            // 將所要執行作業寫在$next()之後

            return $response;
        }
    }

##知識點 4.如何將中介層註冊為全域型

    假如你想要某個中介層適用於應用的所有請求，可以將該中介層類別放進 app/Http/Kernel.php 類別的 $middleware 屬性內。

    app/Http/Kernal.php

    protected $middleware = [
        //陣列內的中介層皆為全域型，即適用於所有請求
        \App\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \App\Http\Middleware\TrustProxies::class,
    ];

##知識點 5.如何將中介層註冊為路由型

    假如你希望能設定中介層只處理某些路由，你就應該為 app/Http/Kernal.php的$routeMiddleware屬性加入一個新key值，對應給該中介層。例如：

     protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    ];

    一旦中介層被定義在 HTTP kernal內，你就能夠在路由內使用middleware方法來設定中介層：

    Route::get('admin/profile', function () {
        //
    })->middleware('auth');

    想要為某路由分類多個中介層也是沒問題的，如下：

    Route::get('/', function () {
        //
    })->middleware('first', 'second');


    假使不想要使用key來設定，也可以直接使用中介層類別名，如下：

    use App\Http\Middleware\CheckAge;

    Route::get('admin/profile', function () {
        //
    })->middleware(CheckAge::class);

##知識點 6.將多個中介層指定為一個群組

    有時候你想要組織多個中介層在一個key底下，以便更方便的指定給路由。你可以利用 kernal 檔案內的 $middlewareGroups 屬性

    預設，Laravel提供了web和api這兩個中介層群組，各自包含了提供給Web UI路由和API路由所需要的中介層：

    如下例：

    protected $middlewareGroups = [
        //給一般網頁請求用的中介層
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
        //給API請求用的中介層
        'api' => [
            'throttle:60,1',
            'auth:api',
        ],
    ];

    設定好中介層群組後要分配給路由的語法，和分配一般中介層並無二致，如下示範：

    Route::get('/', function () {
        //
    })->middleware('web');

    Route::group(['middleware' => ['web']], function () {
        //
    });

    PS：預設web中介層群組就會分配給 routes/web.php裡頭的所有路由，而api中介層則是分配給 routes/api.php裡頭的所有路由。這部份是由 RouteServiceProvider負責的。
