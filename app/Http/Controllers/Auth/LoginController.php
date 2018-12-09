<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){

            $request->session()->regenerate();
            $user = Auth::user();
            $request->session()->put('role', $user->role);

            return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());

        }
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout(){
      Auth::logout();
      return redirect(Route('books.all'));
    }
}
