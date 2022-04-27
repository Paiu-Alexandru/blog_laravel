<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Auth;
use Image;

class LoginController extends Controller
{
    public function userLogout()
    {
        Auth::logout();

        return Redirect()->route('login');
    }
    public function interfaceLogout()
    {
        Auth::logout();

        return redirect('home');
    }
}
