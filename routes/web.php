<?php
// Laravelではルーティングを設定するためのファイルが2種類ある
// web.phpは画面表示する際のルーティングファイル
// api.phpのルーティングは外部からのアクセス用のルーティングファイル

use Illuminate\Support\Facades\Route;
// フォーサードを使うためのコード。しかし、routeはlaravelではエイリアンスというものが設定されている。

// エイリアンスに登録することによってuse宣言でパスを指定しなくとも呼びだすことができる。

// config\app.phpの下記の記述によってエイリアンスに登録しております。

// 'Route' => Illuminate\Support\Facades\Route::class
// だから消しても、routeが使える。
use App\Http\Controllers\TodoController;
// 使うコントローラーの場所。
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
// もっとも基本的なLaravelルートはURIとクロージャを引数に取り、複雑なルーティング設定ファイルなしでもルートと動作を定義できる、非常にシンプルで表現力豊かなメソッドを提供しています。
Route::get('/todo', [TodoController::class, 'index'])->name('todo.list');
// 　todoコントローラーのindexメソッドを使う。
Route::post('/todo/update', [TodoController::class, 'store'])->name('todo.store');
Route::post('/todo/destroy/{id}', [TodoController::class, 'destroy'])->name('todo.destroy');
// Route::post('/todo/new/{id}', [TodoController::class, 'update'])->name('todo.new');




Route::get('/', function () {
    return redirect('/todo');
});

