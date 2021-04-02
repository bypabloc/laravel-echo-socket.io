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

Route::get('/public-message', function () {
    event(new \App\Events\PublicMessage());
    return 'Mensaje publico';
});

Route::get('/private-chat', function () {
    event(new \App\Events\PrivateMessage(auth()->user()));
    dd('Private event executed successfully.');
});

Route::get('/user-channel', function () {
    // event(new \App\Events\UserEvent());
    event(new \App\Events\UserEvent(auth()->user()));
    dd('UserEvent event executed successfully.');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
