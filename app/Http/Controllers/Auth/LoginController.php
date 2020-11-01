<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;


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

    public function username()
    {
        return 'username';
    }

    public function login(Request $request)
    {
      $this->validate($request, [
          //username validation
          'username' => 'required|string',
          'password' => 'required|string',
      ]);

      //do validation, if input is username, it will use username, unless this will use email

      $loginType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email_user' : 'username';

      $login = [
          $loginType => $request->username,
          'password' => $request->password
      ];

      // login validate
      if (auth()->attempt($login)) {
          //if success
          return redirect()->route('barang.index');

      }

      //else, will show flash notification
      return redirect()->route('login')->with(['error' => 'Email/Password salah!']);


    }
}
