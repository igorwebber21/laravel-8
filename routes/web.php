<?php

namespace App\Http\Controllers;

use App\Events\MessageNotification;
use Illuminate\Http\Request;
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

Route::get('/', [MainController::class, 'index'])->name('main');

// queue - очереди
Route::get('/queue', [QueueController::class, 'index'])->name('queue.index');

Route::get('/cache', [CacheController::class, 'index'])->name('cache.index');


Route::get('/chat', function(){
    return view('chat');
});

Route::post('/enter-chat', function(Request $request){
    session()->put('userId', substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, 10) );
    session()->put('userName', $request->userName);
    session()->put('userAvatar', $request->userAvatar);
    echo 1;
});

Route::post('/chat-logout', function(){

    session()->forget('userId');
    session()->forget('userName');
    session()->forget('userAvatar');
    echo 1;
});


Route::post('/chat', function(Request $request){
    event(new MessageNotification($request->message));
});


Route::get('/collection', [CollectionController::class, 'index'])->name('collection.index');

Route::get('/contracts', [ContractsController::class, 'index'])->name('contracts.index');

