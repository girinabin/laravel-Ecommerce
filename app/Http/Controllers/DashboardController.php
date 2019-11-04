<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function logout()
    {
    	Auth::logout();
    	return redirect()->back()->with('error','Logout Successfull');
    }

    public function admin()
    {
    	return view('cd-admin.home.home')->withToastSuccess('login Successfully!');
    }
}
