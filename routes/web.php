<?php

use Illuminate\Http\Request;

use App\Http\Controllers\loginregistercontroller;

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('home');
    });

    Route::get('/auth/login', [loginregistercontroller::class, 'login'])
    ->name('auth.login');

    Route::get('/auth/register', [loginregistercontroller::class, 'register'])
    ->name('auth.register');
});

Route::group(['middleware' => ['auth', 'checklevel:admin']], function () {
    
    Route::get('/user/home', [LoginRegisterController::class, 'userHome'])
    ->name('user.home');
});
Route::group(['middleware' => ['auth', 'checklevel:user']], function () {

    Route::get('/admin/home', [LoginRegisterController::class, 'adminHome'])
    ->name('admin.home');
});
Route::get('/logout', [LoginRegisterController::class, 'logout'])
->name('logout');
Route::post('/postRegister', [LoginRegisterController::class, 
'postRegister'])->name('postRegister');

Route::post('/postLogin', [LoginRegisterController::class, 'postLogin'])
->name('postLogin');

Route::post('/postRegister', [LoginRegisterController::class, 
'postRegister'])->name('postRegister');
