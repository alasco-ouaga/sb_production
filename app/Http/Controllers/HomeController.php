<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        if (!Auth::user()) {
            return view("auth.login");
        } 
        else {
            return view("admin.index.index");
        }
    }
}
