<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLoginController;

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
Route::get('/user-list', [UserLoginController::class,'UserList'])->name('user-list');
Route::get('/user-create',[UserLoginController::class,'userCreate'])->name('user-create');
Route::post('/user-store',[UserLoginController::class,'userStore'])->name('user-store');
Route::post('/user-import',[UserLoginController::class,'userImport'])->name('user-import');
Route::get('/user-export', [UserLoginController::class, 'userExport'])->name('user-export');
Route::post('/user-status',[UserLoginController::class,'userStatus'])->name('user-status');
Route::post('/user-mail',[UserLoginController::class,'userMail'])->name('mail');

