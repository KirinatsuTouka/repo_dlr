<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //
    public function index(){
        if(Auth::check()){
            return view('menu/index');
        }else{
            return view('top');
        }

    }

    public function secret()
    {
    return view('secret/secret');
    }
}
