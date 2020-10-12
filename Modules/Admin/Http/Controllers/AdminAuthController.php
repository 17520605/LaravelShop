<?php

namespace Modules\Admin\Http\Controllers;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class AdminAuthController extends Controller
{
    public function getLogin()
    {
        return view('admin::auth.login');
    }

    public function postLogin(Request $request)
    {
        $data = $request->only('email', 'password');
        if (Auth::guard('admins')->attempt($data)) {
            return redirect()->route('admin.home');
        }
        return redirect()->back();
    }

    public function logOutAdmin()
    {
        Auth::guard('admins')->logout();
        return redirect()->route('admin.login');
    }
}
