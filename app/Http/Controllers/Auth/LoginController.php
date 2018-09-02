<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * 設定登入後所要轉址的路徑.
     *
     * @var string
     */
    protected $redirectTo = '/backend';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //自定義登入表單
    public function showLoginForm()
    {
        return view('auth.login2');
    }

    //自定義驗證用欄位
    public function username()
    {
        return 'name';
    }

    //Socialite套件使用Action=====================================

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
        return redirect('/backend');

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
                'tel'      => '0911234567',
                'password' => bcrypt('123456'),
            ];
            return User::create($data);
        }
    }
}
