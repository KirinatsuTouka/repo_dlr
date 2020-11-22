<?php

namespace App\Http\Controllers\Top;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RegistController extends Controller
{
    //
    public function regist(){
        return view('top.regist');
    }
}
