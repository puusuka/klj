<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Lunchmap</title>
        <style>body {padding: 10px;}</style>
    </head>
    <body>
        <h1>お店一覧</h1>

          @foreach ($tasks as $task) 
             <p> 
               
                 {{ $task->name }} 
                
             </p> 
         @endforeach 
    </body>
</html>