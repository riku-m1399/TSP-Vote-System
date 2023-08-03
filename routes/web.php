<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\ResultController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [PollController::class, 'index'])->name('index');

    // Poll
    Route::group(['prefix' => 'poll', 'as' => 'poll.'], function(){
        Route::get('/{id}/show', [PollController::class, 'show'])->name('show');
        Route::post('/store', [PollController::class, 'store'])->name('store');
        Route::get('/{id}/announce', [PollController::class, 'announce'])->name('announce');
        Route::get('/{id}/delete', [PollController::class, 'delete'])->name('delete');
        Route::delete('/{id}/destroy', [PollController::class, 'destroy'])->name('destroy');
    });

    // Result
    Route::group(['prefix' => 'result', 'as' => 'result.'], function(){
        Route::post('/{poll_id}/store', [ResultController::class, 'store'])->name('store');
        Route::get('/{poll_id}/show', [ResultController::class, 'show'])->name('show');
        Route::delete('/{poll_id}/delete', [ResultController::class, 'delete'])->name('delete');
    });
});
