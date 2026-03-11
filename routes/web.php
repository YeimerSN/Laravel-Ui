<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function(){
    $user = auth()->user();
    // According the role the user is redirect to users index or tasks index
    if($user->hasRole('admin')){
        return redirect()->route('users.index');
    }
    
    return redirect()->route('tasks.index');
})->name('home');

// Validate routes for users that are loggin in the web
Route::middleware('auth')->group(function (){
    Route::resource('tasks', App\Http\Controllers\TaskController::class);
    Route::middleware('role:admin')->group(function () {
        Route::resource('users', App\Http\Controllers\UserController::class);
    });
});
