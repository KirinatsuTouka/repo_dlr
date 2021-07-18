<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'member'], function(){
    Route::get('index', 'MemberController@index')->name('member.index');
    Route::get('create', 'MemberController@create')->name('member.create');
    Route::post('store', 'MemberController@store')->name('member.store');
    Route::get('show/{id}', 'MemberController@show')->name('member.show');
    Route::get('edit/{id}', 'MemberController@edit')->name('member.edit');
    Route::post('update/{id}', 'MemberController@update')->name('member.update');
    Route::post('destroy/{id}', 'MemberController@destroy')->name('member.destroy');
});
