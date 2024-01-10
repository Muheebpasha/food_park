<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function index() {
       return view('admin.auth.login');
    }
    function forgetPassword() : View {
        return view('admin.auth.forget-password');
    }
}
