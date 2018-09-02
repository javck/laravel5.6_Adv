# Laravel Socialite

> 說明如何利用 Laravel 自帶的 Socialite 套件，來實現使用 Facebook 或 Google+社群帳號等 Oauth 方式來進行登入
> 目前支援的平台計有 Facebook, Twitter, LinkedIn, Google, GitHub and Bitbucket。

[Laravel Socialite 官網說明](https://laravel.com/docs/5.6/socialite)

---

##知識點 1.如何安裝此套件

    在 Terminal 輸入：composer require laravel/socialite

##知識點 2.如何設定此套件

    在設定檔 config/services.php 加入驗證設定，如下：

        'facebook' => [
            'client_id'     => env('FACEBOOK_ID'),
            'client_secret' => env('FACEBOOK_SECRET'),
            'redirect'      => env('FACEBOOK_URL'),
        ],

    PS：別忘了到.env檔補上這三個設定的內容

##知識點 3.如何設定路由

    Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
    Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

##知識點 3.該如何撰寫於 Auth/LoginController 撰寫路由所對應的 Action

    PS:別忘了要導入Socialite.Auth.User這三個類別

    /**
     * 將使用者轉址到登入提供者的驗證頁面.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * 從登入提供者處得到使用者資訊.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {

        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect(BI::getLoginRedirect());

    }

    /**假如通過登入提供者驗證後發現使用者已經註冊過，就取得該使用者Record，否則就自動進行簡易註冊動作
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
        //可能已經用其他管道註冊過
        $authUser = User::where('email', $user->email)->first();

        //找到就直接返回，否則就新增資料...
        if ($authUser) {
            return $authUser;
        }else{
            $data = [
                'name'     => $user->name,
                'email'    => $user->email,
                'password' => bcrypt('123456'),
                'tel'      => '0911234567',
            ];
            return User::create($data);
        }
    }

## 知識點 4.如何修改社群登入連結

## 知識點 5.取得 Facebook API 帳密

    [到 Facebook 開發者平台去申請](https://developers.facebook.com/apps/)
