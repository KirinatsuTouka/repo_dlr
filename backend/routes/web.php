<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Top\TopController;
use App\Http\Controllers\Top\RegistController;
use App\Http\Controllers\Menu\MenuController;
use App\Http\Controllers\Menu\TestinputController;

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
    return view('/top/top');
});
Route::get('menu/index', function(){
    return redirect()->route('index');
});
Route::get('/hello', function () {
    $hoge = 'hello world!';
    return $hoge;
});

Route::get('/phpinfo', function () {
    return view('phpinfo');
});

Route::get('/sample/route/1', function(){
    $result = 5 * 20;
    $result += 50;
    return $result;
});

Route::get('/top', [TopController::class, 'top'])->name('top');
Route::get('/top/register', [RegistController::class, 'regist'])->name('regist');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/logout', function(){
    return redirect('top');
});

Route::get('/index', [MenuController::class, 'index'])->name('index');

Route::get('testinput/{id}/show', [TestinputController::class, 'show'])->name('show');
Route::get('testinput/{id}/edit', [TestinputController::class, 'edit'])->name('edit');

Route::get('secret/secret', [MenuController::class, 'secret'])->name('secret');