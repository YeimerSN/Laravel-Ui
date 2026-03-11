<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function(){
    $user = auth()->user();

    if($user->hasRole('admin')){
        return redirect()->route('users.index');
    }
    
    return redirect()->route('tasks.index');
})->name('home');


Route::middleware('auth')->group(function (){
    Route::resource('tasks', App\Http\Controllers\TaskController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
});
