<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth::login.login');
    }

    /**
     * Admin Login.
     */
    public function login(Request $request)
    {
        $check = $request->all();

        if(Auth::attempt(['email' => $check['email'], 'password' => $check['password']]))
        {
            return 'ok';
            // return redirect()->route('admin.dashboard')->with('success','You are Successfully Loged-in..!!');
        }
        else
        {
            return back()->with('error','Invalid Email Or Password');
        }
        return view('admin.layouts.master');
    }

    /**
     * Admin Logout.
     */
    public function logout()
    {
        Auth::logout();
        Session::flush(); // সমস্ত সেশন ডেটা মুছে ফেলা
        return redirect()->route('login.page')->with('error', 'Logout Successfully!');
    }
}
