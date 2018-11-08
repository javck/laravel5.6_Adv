# 多語系支持 mcamara / laravel-localization

> 說明如何使用 mcamara ，來達成讓應用能夠透過路徑，同時支援多個語系，比如/en/shop 抑或是/zh_tw/shop。

[mcamara] 官網說明](https://github.com/mcamara/laravel-localization)

##知識點 1.如何安裝套件

    可開啟Terminal命令列，透過composer來安裝：

        composer require mcamara/laravel-localization

    在Laravel 5.5，service provider(服務供應器)和facde將會自動地被註冊。但對於較早的框架版本，請跟隨以下的步驟來註冊：

    Step 1.在 config/app.php 註冊service provider

        'providers' => [
    	// [...]
                Mcamara\LaravelLocalization\LaravelLocalizationServiceProvider::class,
        ],
    Step 2.同樣地，在 config/app.php 註冊LaravelLocalization facade:

        'aliases' => [
    	// [...]
                'LaravelLocalization' => Mcamara\LaravelLocalization\Facades\LaravelLocalization::class,
        ],

##知識點 2.設定套件

    ###設定檔案 Config Files
    為了能編輯此套件的預設設定檔，你需要執行以下命令：

        php artisan vendor:publish --provider="Mcamara\LaravelLocalization\LaravelLocalizationServiceProvider"

    完成後，config/laravellocalization.php將會被建立。在這檔案內，你將找到所有套件能夠被編輯的設定。編輯laravellocalization.php，主要修改supportedLocales，移除所需要支持語系的註解。

        'useAcceptLanguageHeader' => false, //設定當網址沒有語系路徑段時，是否取用瀏覽器Accept-Language header的設定，若否則取自app.php的設定
        'hideDefaultLocaleInURL' => true, //設定是否隱藏預設的語系路徑段
        'urlsIgnored' => [], //設定哪些路徑要排除，不進行翻譯轉址

    ###服務供應器 Service Providers
    否則，你能夠使用 ConfigServiceProviders （檢查此檔案來得到更多資訊）

    例如，編輯預設 config service provider ，該檔會在安裝後被Laravel載入。這個檔案位在app/providers/ConfigServicePovider.php，內容如下：

    <?php namespace App\Providers;

    use Illuminate\Support\ServiceProvider;

    class ConfigServiceProvider extends ServiceProvider {
        public function register()
        {
            config([
                'laravellocalization.supportedLocales' => [
                    'ace' => array( 'name' => 'Achinese', 'script' => 'Latn', 'native' => 'Aceh' ),
                    'ca'  => array( 'name' => 'Catalan', 'script' => 'Latn', 'native' => 'català' ),
                    'en'  => array( 'name' => 'English', 'script' => 'Latn', 'native' => 'English' ),
                ],

                'laravellocalization.useAcceptLanguageHeader' => true,

                'laravellocalization.hideDefaultLocaleInURL' => true
            ]);
        }

    }

    這個設定檔加入Catalan 和 Achinese作為語系，並且覆蓋套件內任何其他支持語系和設定。
    你能夠建立你自己的config providers並把他們加入你的應用設定檔，可檢查在config/app.php檔案內的 providers 陣列。

##知識點 3.如何使用此套件?
Laravel 本地化使用請求的網址來判斷適合的語系。為了達到這個目的，一個路由群組應該要加到 route.php 檔裡頭。它需要過濾所有必須本地化的頁面。

    // app/Http/routes.php
    //要被本地化的頁面
    Route::group(['prefix' => LaravelLocalization::setLocale()], function()
    {
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        Route::get('/', function()
        {
        return View::make('hello');
        });

        Route::get('test',function(){
            return View::make('test');
        });

    });

    /* 剩下不要被本地化的頁面 */

    一旦這個路由群組被加入路由檔內，使用者能夠取用所有被加入 supportedLocales 設定的語系。(預設是en和es，可到config區塊來改變選項。)例如，使用者現在能取用兩個不同的語系。透過請求以下網址：

    http://url-to-laravel/en
    http://url-to-laravel/es

    假如語系並未出現在網址上，如下例，又或者是並未被定義在 supportedLocales 之內，系統將使用應用的預設語系，又或者是使用者瀏覽器的預設語系(定義在config檔內)。

    http://url-to-laravel

    當語系定義完，語系變數將會被存在session裡面(假如中介層有啟用)，所以在語系定義過後就不需要在網址內加入/lang/這段路徑，因為將會讓該使用者對應最後已知語系。假如使用者取用不同的語系，該語系變數就會被改變，使用最新的語系變數來翻譯其他新拜訪頁面。

    版型檔和所有語系檔應該要跟隨Lang類別。

##知識點 4.此套件的中介層負責什麼工作?

    這個套件包含一個中介層物件來轉址所有非本地化路由到對應的本地化路由。所以，假如使用者訪問 http://url-to-laravel/test ，那麼系統發現這個中介層是啟用的，並且使用者的當前語系是'en'，它將會自動地把使用者導到 http://url-to-laravel/en/test。這主要是用來避免不同網址卻回傳相同內容的問題以優化SEO。

    為此，你必須註冊這個中介層到 app/Http/Kernal.php 檔案內，像這樣：

    <?php namespace App\Http;

    use Illuminate\Foundation\Http\Kernel as HttpKernel;

    class Kernel extends HttpKernel {
        /**
        * The application's route middleware.
        *
        * @var array
        */
        protected $routeMiddleware = [
            /**** 其他中介層 ****/
            'localize' => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes::class,
            'localizationRedirect' => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter::class,
            'localeSessionRedirect' => \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect::class,
                    'localeViewPath' => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath::class
            // REDIRECTION MIDDLEWARE
        ];
    }

    // app/Http/routes.php

    Route::group(
        [
            'prefix' => LaravelLocalization::setLocale(),
            'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
        ],
        function()
        {
            /** 加入所有本地化路由到這個群組之內 **/
            Route::get('/', function()
            {
                return View::make('hello');
            });

            Route::get('test',function(){
                return View::make('test');
            });
    });

    /** 其他不應該被本地化的頁面 **/

    為了要啟用，你只需加入這個中介層到想要取用本地化的路由裡頭。另外，假如你想要隱藏預設語系但永遠顯示其他路由到網址上，把 hideDefaultLocaleInURL 設定值改為true。設好之後，假如預設語系是en，那所有包含/en/語系路徑的網址將會被轉址到相同但是去掉/en/這個語系路徑的網址，而且語系仍舊是en，也就是English。

    當 hideDefaultLocaleInURL 和 useAcceptLanguageHeader 都設為true，那語言協商使用 Accept-Language 標頭將只會發生在 session('locale)為空的時候。在協商之後，session('locale)將被對應設定而且將不會再被呼叫。

    ###透過view-base-path設定當前語系
    為了設定當前語系作為 view-base-path，只需要註冊 localeViewPath-middlware 到Kernal.php，就像之前描述的那樣。現在你能夠把你的視圖打包進以語系分類的資料夾內，就如同翻譯檔的架構那樣，如下所示。

    resources/views/en/, resources/views/fr, ...

##知識點 5.能夠自訂語系路徑區塊?
你能夠修改 supportedLocales 透過重新命名他們的 key，使用字串 uk 而非 en-GB 來提供自訂語系路徑區塊是可能的。當然，你需要避免重複使用已經存在的 key，並盡可能服從慣例。但假使你正在使用自訂 key，你需要將它存在 localesMapping 陣列內。這個 localesMapping 陣列是需要被用來啟用 LanguageNegotiator 從而能根據 HTTP Accept Language Header 來正確分配希望的語系。這是一個將 HTTP Accept Language Header 對應到語系路徑區塊'uk'的例子：

    // config/laravellocalization.php
    'localesMapping' => [
        'en-GB' => 'uk'
    ],

##知識點 6.幫助函式?
此套件提供了一些有幫助的函式，像這些：

    ###取得指定語系的網址
    /\*\*

    -   Returns an URL adapted to $locale
    -
    -   @param string|boolean $locale Locale to adapt, false to remove locale
    -   @param string|false $url URL to adapt in the current language. If not passed, the current url would be taken.
    -   @param array $attributes Attributes to add to the route, if empty, the system would try to extract them from the url.
    -
    -   @throws UnsupportedLocaleException
    -
    -   @return string|false URL translated, False if url does not exist
    \*/
    public function getLocalizedURL($locale = null, $url = null, $attributes = array())

    //如要在視圖內使用，可以像這樣呼叫，它將會回傳需求語系的本地化後網址:
    {{ LaravelLocalization::getLocalizedURL(optional string $locale, optional string $url, optional array $attributes) }}

    Route Model Binding?放心，當生成本地化路徑時route model binding是有被支援的。

    ###取得乾淨的路由
    /\*\*

    -   It returns an URL without locale (if it has it)
    -   Convenience function wrapping getLocalizedURL(false)
    -
    -   @param string|false $url URL to clean, if false, current url would be taken
    -
    -   @return stringURL with no locale in path
        \*/
        public function getNonLocalizedURL($url = null)

    //如要在視圖內使用，可以像這樣呼叫，它將會回傳任何本地化網址的乾淨網址
    {{ LaravelLocalization::getNonLocalizedURL(optional string $url) }}

    ###取得網址的語系key
    /\*\*

    -   Returns an URL adapted to the route name and the locale given
    -
    -   @throws UnsupportedLocaleException
    -
    -   @param string|boolean $locale Locale to adapt
    -   @param string $transKeyName Translation key name of the url to adapt
    -   @param array $attributes Attributes for the route (only needed if transKeyName needs them)
    -
    -   @return string|false URL translated
    \*/
    public function getURLFromRouteNameTranslated($locale, $transKeyName, $attributes = array())

    //如要在視圖內使用，可以像這樣呼叫，它將會回傳一個路由，根據傳入語系來進行本地化。假如該翻譯 key 並未存在於語系內，此函式將會回傳 false
    {{ LaravelLocalization::getURLFromRouteNameTranslated(string $locale, optional array $transKeyNames, optional array $attributes) }}

    ###取得支持語系列表
    /\*\*

    -   Return an array of all supported Locales
    -
    -   @return array
        \*/
        public function getSupportedLocales()

    //如要在視圖內使用，可以像這樣呼叫，此函式將會回傳所有支持語系與其屬性，型態為陣列。
    {{ LaravelLocalization::getSupportedLocales() }}

    ###取得支持語系列表，以指定的順序
    /\*\*

    -   Return an array of all supported Locales but in the order the user
    -   has specified in the config file. Useful for the language selector.
    -
    -   @return array
        \*/
        public function getLocalesOrder()

    //如要在視圖內使用，可以像這樣呼叫，此函式將回傳所有支持語系但根據設定檔所指定的路徑。你能夠使用這個函式來印出語言選擇器。
    {{ LaravelLocalization::getLocalesOrder() }}

    ###取得支持語系Keys
    /\*\*

    -   Returns supported languages language key
    -
    -   @return array keys of supported languages
        \*/
        public function getSupportedLanguagesKeys()

    //如要在視圖內使用，可以像這樣呼叫，這個函式將回傳支持語系的對應key，型態為陣列。
    {{ LaravelLocalization::getSupportedLanguagesKeys() }}

    ###設定語系
    /\*\*

    -   Set and return current locale
    -
    -   @param string $locale Locale to set the App to (optional)
    -
    -   @return string Returns locale (if route has any) or null (if route does not have a locale)
        \*/
        public function setLocale($locale = null)

    //如要在視圖內使用，可以像這樣呼叫，這個函式將改變應用的當前語系。假如語系沒被傳入，語系將會透過 cookie . session (假如先前有存入) . 瀏覽器Accept-Language header ，又或是預設應用語系來決定，根據你的設定檔。這個函式應該被任何要被翻譯的路由之prefix所呼叫，請見 Filters 區塊來取得更多資訊。
    {{ LaravelLocalization::setLocale(optional string $locale) }}

    ###取得當前語系
    /\*\*

    -   Returns current language
    -
    -   @return string current language
        \*/
        public function getCurrentLocale()

    //如要在視圖內使用，可以像這樣呼叫，此函式將回傳當前語系的key
    {{ LaravelLocalization::getCurrentLocale() }}

    ###取得當前語系名稱
    /\*\*
    -   Returns current locale name
    -
    -   @return string current locale name
        \*/
        public function getCurrentLocaleName()

    //如要在視圖內使用，可以像這樣呼叫，此函式將回傳當前語系的名稱，型態為字串，如English/Spanish/Arabic/ ..etc。
    {{ LaravelLocalization::getCurrentLocaleName() }}

     ###取得當前語系方向
    /\*\*

    -   Returns current locale direction
    -
    -   @return string current locale direction
        \*/
        public function getCurrentLocaleDirection()

    //如要在視圖內使用，可以像這樣呼叫，此函式將回傳當前語系的方向，型態為字串，如ltr/rtl。
    {{ LaravelLocalization::getCurrentLocaleDirection() }}

    ###取得當前語系腳本
    /\*\*

    -   Returns current locale script
    -
    -   @return string current locale script
        \*/
        public function getCurrentLocaleScript()

    //如要在視圖內使用，可以像這樣呼叫，此函式將以 ISO 15924 編碼回傳當前語系腳本，型態為字串，如"Latn", "Cyrl", "Arab", etc。
    {{ LaravelLocalization::getCurrentLocaleScript() }}

##知識點 7.創造語言選擇器
假如你想在你的專案上支持多語系，你也許想要提供使用者一個管道得以改變語言。以下是一個簡單的 blade 範本碼例子，讓你得以建立自己的語言選擇器。

    <ul>
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <li>
                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    {{ $properties['native'] }}
                </a>
            </li>
        @endforeach
    </ul>

這裡預設語言將會在 getLocalizedURL() 被強迫顯示在網址上，哪怕 hideDefaultLocaleInURL 為 true，而且 Route Model Binding 是有支持的。

##知識點 8.翻譯路由
你能夠根據你想要顯示的語言來修改你的網址。比如 http://url/en/about 和 http://url/es/acerca(acerca是about的spanish版本)，又或是 http://url/en/view/5 和 http://url/es/ver/5 (var 是 view 的 spanish 版本)，都將被轉址到相同的控制器使用合適的過濾器和設定以下翻譯：

因為它是中介層，首先你必須註冊它到 app/Http/Kernel.php 檔案裡頭，像這樣：

    <?php namespace App\Http;

    use Illuminate\Foundation\Http\Kernel as HttpKernel;

    class Kernel extends HttpKernel {
        /**
        * The application's route middleware.
        *
        * @var array
        */
        protected $routeMiddleware = [
            /**** OTHER MIDDLEWARE ****/
            'localize' => 'Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes',
            // TRANSLATE ROUTES MIDDLEWARE
        ];
    }
    // app/Http/routes.php

    Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localize' ] // Route translate middleware
    ],
    function() {
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        Route::get('/', function() {
            // This routes is useless to translate
            return View::make('hello');
        });

        Route::get(LaravelLocalization::transRoute('routes.about'), function() {
            return View::make('about');
        });

        Route::get(LaravelLocalization::transRoute('routes.view'), function($id) {
            return View::make('view',['id'=>$id]);
        });
    });

    /** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/

    在路由檔你只需要加入 LaravelLocalizationRoutes 過濾器和 LaravelLocalization::transRoute函式到每一個你想要使用翻譯key的路由。

    然後你必須創造翻譯檔並加入每一個你想要翻譯的key。我建議建立一個route.php檔案到你的 resources/lang/language_abbreviation 資料夾。對之前的例子，我建立兩個翻譯檔案，它們長得像這樣：

    // resources/lang/en/routes.php
    return [
    "about" => "about",
    "view" => "view/{id}", //we add a route parameter
    // other translated routes
    ];
    // resources/lang/es/routes.php
    return [
    "about" => "acerca",
    "view" => "ver/{id}", //we add a route parameter
    // other translated routes
    ];

    當檔案被儲存後，你能夠正常的取用 http://url/en/about , http://url/es/acerca , http://url/en/view/5 和 http://url/es/ver/5，沒有任何問題。

##知識點 9.事件
你能夠在翻譯時捕捉網址參數，假如你也想要翻譯它們的話。為達此，只需要為路由創造一個事件偵聽器，翻譯事件像這樣：

    Event::listen('routes.translation', function($locale, $attributes)
    {
    // 作你的操作

        return $attributes;

    });

##知識點 10.問題排除

    ###如果出現以下錯誤，表示Middleware尚未進行註冊，請參考知識點4來進行設定
        ReflectionException (-1)
        Class localeSessionRedirect does not exist
