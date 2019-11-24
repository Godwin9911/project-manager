<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $guard = 'admin';

    protected $redirectTo = '/admin-dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showloginForm()
    {
        return view('auth.adminLogin');
    }

    public function login(Request $request)
    {
        if (auth()->guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            // $user = Auth::guard('api')->user();
            auth()->guard('admin')->user();
            return redirect($this->redirectTo);
        }

        return back()->withErrors(['email' => 'Email or password are wrong']);
    }
}
