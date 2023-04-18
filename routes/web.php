<?php
// オブジェクト指向　いかに効率よく開発が行われるかに必要な考え方
// 「継承」「カプセル化」「ポリモーフィズム」がある。
// カプセル化　https://webpia.jp/encapsulation/#index_id1　　他のプログラムから干渉されないように守ること。「private」「public」みたいなもので保護されているということ。ほかのものから干渉を受けないようにするということ。
// オブジェクトのデータが外から直接変更されることを禁止する
// アクセス指定子によってカプセル化するかしないか決められる
// カプセル化されているデータはクラス内の関数によって変更できる
// ポリモーフィズム
// https://webpia.jp/polymorphism/
// american.Hello();
// japanese.Hello();
// indian.Hello();
// korean.Hello();
// chinese.Hello();
// russian.Hello();
// german.Hello();
// Human* human[N] = 
// { &american,&japanese,&indian,&korean,&chinese,&russian,&german };

// それぞれでHello()関数を呼び出す	
// for (int i = 0; i < N; i++) {
// human[i]->Hello();}
// この違い。よりまとめて見やすくする。


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
// Route::post('/todo/update', [TodoController::class, 'post']);
//上のやつはバリデーションのやつやけど順番を変えたら、エラー出る。ポストはあとになるようにになるようにする。
// 第1引数にはURIを、第2引数にはそれによって呼び出される処理。[クラス名::class, ‘アクションメソッド名’]
Route::post('/todo/destroy/{id}', [TodoController::class, 'destroy'])->name('todo.destroy');
// PHPではシングルアロー演算子(->)が配列へのアクセスに使うのに対して、ダブルアロー演算子(=>)は配列に値を代入するときに使います。https://webukatu.com/wordpress/blog/39841/#i，プロパティへのアクセス。
// クラス内でプロパティやメソッドを参照するときは、$this という変数を使います。       
// $this->name = $name;
// $this->age = $age;
// $this->haveFever = $haveFever;
// ２，メソッドへのアクセス
// $sample_user->show_user_info();
// インスタンスから矢印「->」を続けてメソッド名を記述することで、呼び出すことができます。


Route::post('/todo/new/{id}', [TodoController::class, 'update'])->name('todo.new');
// メソッドやルートに指定するのは「get」と「post」のどちらかになります。

// ページを表示する場合はget、データの処理（データの追加や削除、更新）を行う場合はpostメソッドを使用いたします。
Route::get('/', function () {
    return redirect('/todo');
});

