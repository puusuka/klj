<?php

namespace App\Http\Controllers;             
// ファイルがある場所
use Illuminate\Http\Request;         
//   Requestの機能を使うため。
//依存注入により、現在のHTTPリクエストインスタンスを取得するには、タイプヒントでIlluminate\Http\Requestクラスをコントローラーメソッドに指定します。  
use App\Models\tasks;                 
// ファイルがある場所,
//モデルとコントローラーをつなぐchord
use App\Http\Requests\ClientRequest;    
// ファイルがある場所、ClientRequestを使うためのchord


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
        //$tasks = tasks::first();
        //データベースの最初だけ取り出します。

        //$tasks = tasks::all(); 
        //タスクテーブルからすべて取り出します。
        //$tasks = \DB::table('tasks')->get();
        //$tasks = tasks::all();と同じ機能 
        $tasks = tasks::get();
        //$tasks = tasks::all();と同じ機能 
      
        
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
    //丸括弧内には「Request $request」とありますが、このように記述することで「$requestにフォームやURLのパスパラメータから受け取った情報を代入」しています。より正確に説明すると、Requestクラスを$requestにインスタンス化している、のですが、現状はLaravelの機能で「Request 変数名」というように記述するとフォーム等に入力された情報を受け取ることができる。
    {
         
        $tasks = new tasks;
        //新しいデータベースを作る
        $tasks->name  = $request->input('name');
        //$tasks->name = request('name');と同じ。
        // $tasks->name このコードが意味するのはタスクテーブルのnameカラムということで、$request->input('name');　このコードが意味するnameもタスクテーブルのnameカラム。
        //フォームから受けとったリクエストをnameに代入する。その時にcreated-atも自動で作られる。


        $tasks->save();
        //作られたデータベースを保存する
        //  return view('index', ['tasks' => $tasks]);
        return redirect()->route('todo.list', ['name' => $tasks->name]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
     public function post(ClientRequest $request)
   {
        //$validate_rule = [
          //  'name' => 'required',
        //    'name' => 'max:20'
        //];
    //    $this->validate($request, $validate_rule);
        // $form = $request->all();
        // tasks::post($form);
        $request->validate([
	     'name' => 'required',
	    // 'name' => 'max:20',
　　　　]
    //   [
        //     'name.required' => 'タイトルは必須です。',
            //  'name.required'  => 'bodyは必須項目です。',
    //   ]
    //);
       //return redirect('/todo');
        return view('todo.index');
   }
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
    public function update(Request $request,$id)
    //$requestと$idを受け取るからここにはこうかく。
    {   $tasks = tasks::find($id);
        //(x)だとxのデータを所得する。
        $tasks->name = $request->input('name');
        //$tasks->name = request('name');と同じ
        //フォームに入った名前をタスクの名前にする。
        $tasks->save();
        //データベースに保存
        return redirect()->route('todo.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id )
    {
        $tasks = tasks::find($id);
        //idを見つけ出して
        $tasks->delete();
        //そのテーブルを削除する
        return redirect()->route('todo.list');
    }
}
