<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        //isMethod(引数)に指定した文字列とHTTP動詞（getやpost）が一致するかを判定する
        //https://myenigma.hatenablog.com/entry/2015/08/02/230752#HTTP%E3%81%AE8%E3%81%A4%E3%83%A1%E3%82%BD%E3%83%83%E3%83%89
        //postと$dataとが一致するか
        if ($request->isMethod('post')) {

            $data = $request->only('mail', 'password');
            // ログインが成功（一致）したら、トップページへ　失敗（不一致）したらauth.loginへ
            //↓ログイン条件は公開時には消すこと
            if (Auth::attempt($data)) {
                return redirect('/top');
            }
        }
        return view("auth.login");
    }
}
