<!DOCTYPE html>
{{--<!DOCTYPE> はタグではありません。ドキュメントタイプ宣言と呼ばれ、HTML 文書ファイルの先頭に記述し、その HTML ファイルで使用している HTML のバージョンを宣言する。--}}

<html>
  {{--今からhtmlのコードを書きますよ。--}}
    <head>
        <meta charset='utf-8'>
        {{--文字コードのutf-8を使うよー--}}
        <title>Lunchmap</title>
        {{--タイトルはランチマップ--}}
        <style>
        * {
           outline: 1px solid red !important;
          }

        .all{
          background-color:blue;
          height:10%;

        }
 
        .card {
          background-color:white;
          width:33%;
          margin:100px auto;
          overflow: hidden;
          border-radius: 8px;
          box-shadow: 0 4px 15px rgba(0,0,0,.2);
         }
         .table {
          width:100%;
          margin:0 auto;
          }
        .new {
          margin:0 auto;
        }
         
        </style>
    </head>
    <body>
  <div class="all">
     <div class="card">
      <h1>Todo List</h1>
      <div class="new">
          <form action="/todo/update" method="POST" >
          @csrf
          @if (count($errors) > 0)
          <p>入力に問題があります</p>
          @endif
          <input type="text" class="input-update" value= "" name="name">
          <input type="submit" name="submit" value="追加" />
          </form>
      </div>
      <div class="table">
        <table>
         @csrf 
         <tr>
            <th>作成日</th>
            <th>タスク名</th>
            <th>更新</th>
            <th>削除</th>
        </tr>
        @foreach ($tasks as $task)   
        <tr>
               
                 
          <td>
        
          {{ $task->created_at }}
         </td> 
          
            <form action="{{ route('todo.new', [ 'id' => $task->id]) }}" method="POST"> 
            @csrf 
         
                <td>
                
                     <input type="text" class="input-update" value= "{{ $task->name }}" name="name">  
               </td>
            <td>
          
         
         
                   <button type="submit" class="btn btn-danger" >更新</button> 
           
            </td>
          </form> 
           <td>
          <form action="{{ route('todo.destroy', [ 'id' => $task->id]) }}" method="post"> 
         @csrf 
         
         
                   <button type="submit" class="btn btn-danger">削除</button> 
           </form> 
        

          </td>
                   
        
           @endforeach
      </div> 
      </table>
     </div>
  </div>
    </body>
</html>