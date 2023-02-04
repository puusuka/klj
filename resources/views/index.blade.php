<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Lunchmap</title>
        <style>body {padding: 10px;}</style>
    </head>
    <body>
        <form action="/todo/update" method="POST">
        @csrf
        @if (count($errors) > 0)
         <p>入力に問題があります</p>
         @endif
         <input type="text" class="input-update" value= "" name="name">
         <input type="submit" name="submit" value="送信する" />
        </form>
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
          
         
         
                   <button type="submit" class="btn btn-danger"  name="name" value= "{{ $task->name }}" >更新</button> 
           
          </td>
          </form> 
           <td>
          <form action="{{ route('todo.destroy', [ 'id' => $task->id]) }}" method="post"> 
         @csrf 
         
         
                   <button type="submit" class="btn btn-danger">削除</button> 
           </form> 
        

          </td>
                   
        
           @endforeach   
      </table>
    </body>
</html>