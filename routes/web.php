<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',function(){
    $data = [
        'user'=>Auth::user()->name,
    ];
    return view('welcome',$data);
});
Route::get('login/okta', [LoginController::class,'redirectToProvider'])->name('login-okta');
Route::get('logout', [LoginController::class,'logout'])->name('logout');
Route::get('authorization-code/callback', [LoginController::class, 'handleProviderCallback']);