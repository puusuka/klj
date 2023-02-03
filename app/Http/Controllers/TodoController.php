<?php

namespace App\Http\Controllers;             
// ファイルがある場所
use Illuminate\Http\Request;         
//   Requestの機能を使うため。  
use App\Models\tasks;                 
// ファイルがある場所
use App\Http\Requests\ClientRequest;    
// ファイルがある場所


class TodoController extends Controller
// Controllerクラスを継承して、コントローラーの機能をつかうため。Controllerがスーパークラス（親クラス）、TodoControllerが サブクラス（子クラス）。親クラスの機能を継承する。
// class Animal {　  public function bark() {
        // return $this->name . ' barks';
    // }
// }
// class Dog extends Animal {

    // 犬が鳴く（動物クラスのbarkをオーバーライド
    // public function bark() {
        // return $this->name . ' barks Wan Wan';
    // }
// }
// / これみたいに継承して上書きすることができる。（オーバーライド）
// 継承するということはスーパークラスのメソッドを呼ぶことにつながる。
// https://e-seventh.com/php-class-inheritance/

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    // indexメソッド
    {   
        $tasks = tasks::first();

        // $tasks = tasks::all(); 
      //タスクテーブルからすべて取り出します。
        
      return view('index'
        , ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $tasks = tasks::find($id);
        $tasks->name = request('name');
        $tasks->save();
        //  return view('index', ['tasks' => $tasks]);
         return redirect()->route('todo.list', ['name' => $tasks->name]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $tasks = new tasks();
        $tasks->name = $request->name;   
        // $tasks = new tasks;
        // $tasks->name = request('name');
        // $tasks = tasks::find($id);
        $tasks->save();
        return redirect()->route('todo.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tasks = tasks::find($id);
        $tasks->delete();
        return redirect()->route('todo.list');
    }
}
