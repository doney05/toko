<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user == '1') {
                # code...
            }
        }
        return view('auth.login');
    }
    public function store(Request $request)
    {
        // dd($request->all());
         $request->validate([
            'username' => 'required',
            'password' => 'required'
        ],
        [
            'username.required' => 'Username tidak boleh kosong',

        ]);
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role = '1') {
                return redirect()->route('dashboard');
            } else {
                return redirect('/');
            }
            return redirect('/');
        }
        return back()->withErrors([
            'username' => 'Maaf username atau password Anda salah',
        ])->onlyInput('username');
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect()->route('login.index');
    }

    // use AuthenticatesUsers;

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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function authenticated(Request $request, $user)
    {
        // return redirect()->intended();
        Auth::logoutOtherDevices($request->password);
    }
}
