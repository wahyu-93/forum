<?php

use App\Http\Controllers\Forum\AnswerController;
use App\Http\Controllers\Forum\ReplyController;
use App\Http\Controllers\Forum\TagController;
use App\Http\Controllers\Forum\ThreadController;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// thread
Route::resource('thread', ThreadController::class)->except('show');
Route::get('thread/{tag}/{thread}', [ThreadController::class, 'show'])->name('thread.show');

// reply
Route::post('reply/{thread}', [ReplyController::class, 'store'])->name('reply.store');
Route::get('reply/{thread}/{reply}', [ReplyController::class, 'edit'])->name('reply.edit');
Route::patch('reply/{thread}/{reply}', [ReplyController::class, 'update'])->name('reply.update');

// answer
Route::patch('mark-as-answer/{reply}', [AnswerController::class, 'store'])->name('mark.answer.store');

// tag
Route::get('forum/tags',[TagController::class, 'index'])->name('tag.index');
Route::get('forum/{tag}', [TagController::class, 'show'])->name('tag.show');