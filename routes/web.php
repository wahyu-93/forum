<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Forum\AnswerController;
use App\Http\Controllers\Forum\FilterController;
use App\Http\Controllers\Forum\ReplyController;
use App\Http\Controllers\Forum\SearchController;
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

// search
Route::get('forum/search', [SearchController::class, 'index'])->name('thread.search');

// filter
Route::get('forum/filter', [FilterController::class, 'filter'])->name('thread.filter');
Route::get('forum/user/{user}', [FilterController::class, 'filterByUser'])->name('thread.filter.user');

// tag
Route::get('forum/tags',[TagController::class, 'index'])->name('tag.index');
Route::get('forum/{tag}', [TagController::class, 'show'])->name('tag.show');

// account
Route::get('accoount/edit', [AccountController::class, 'edit'])->name('account.edit');
Route::patch('accoount/update', [AccountController::class, 'update'])->name('account.update');