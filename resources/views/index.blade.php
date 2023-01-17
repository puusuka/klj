<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Lunchmap</title>
        <style>body {padding: 10px;}</style>
    </head>
    <body>
        <h1>お店一覧</h1>
       <table>
         
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
          
       <form action="/todo/update" method="POST">
        @csrf
                <td>
                
                     <input type="text" class="input-update" value= "{{ $task->name }}" name="content">  
            </td>
            <td>
           <input type="submit" name="submit" value="送信する" />

          </td>
           {{--<td>
            <a href={{ route('todo.store') }} class='btn btn-outline-primary'>削除</a>

          </td>--}}
                   
         </form>
         @endforeach 
      </table>
    </body>
</html>