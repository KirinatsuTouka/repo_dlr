<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class TestinputController extends Controller
{
    //

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //ぞんざいな照会画面を表示する
        return view('testinput/show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::denies('user')) {
            //ぞんざいな更新画面を表示する
            return view('testinput/edit');
        } else {
            session()->flash('editmsg', 'あんた更新できないよ！！');
            return view('menu/index');
        }
    }

}
