<!DOCTYPE html>
{{--<!DOCTYPE> はタグではありません。ドキュメントタイプ宣言と呼ばれ、HTML 文書ファイルの先頭に記述し、その HTML ファイルで使用している HTML のバージョンを宣言する。--}}

<html>
  {{--今からhtmlのコードを書きますよ。
    htmlには、headとbodyの2つの子要素があります。--}}
    <head>
    {{--headは、ブラウザや検索エンジンのクローラーにWebサイトの情報を伝える部分を指します。--}}
        <meta charset='utf-8'>
        {{--meta chrarset属性は、文字コードの指定をするタグです。 タグの中のchrarsetはキャラクターセットのことで、コンピューターに文字を理解させるために使います。--}}
        <meta name="viewport" content="width=device-width, initial-scale=2.0">
        <title>Lunchmap</title>
        {{--タイトルはランチマップ--}}Kanta1208
    </head>
        <style>
        * {
           outline: 1px solid red !important;
          }

        body{
          background-color:pink;
          height:0px;
            }
        {{-- https://reffect.co.jp/html/block_and_inline_understanding#:~:text=%E3%81%97%E3%81%A6%E3%81%84%E3%81%BE%E3%81%99%E3%80%82-,%E9%AB%98%E3%81%95(height)%E3%81%A8%E5%B9%85(width)%E3%81%AE%E8%A8%AD%E5%AE%9A,%E3%81%AF%E3%82%B3%E3%83%B3%E3%83%86%E3%83%B3%E3%83%84%E3%81%AB%E3%82%88%E3%81%A3%E3%81%A6%E6%B1%BA%E3%81%BE%E3%82%8A%E3%81%BE%E3%81%99%E3%80%82
          ブロック要素
          ブロック要素は幅いっぱい広がり、何もしなければ改行されない。横並びにはならない。
          幅や高さを変更できる。
          marginは上下左右の適応がされる
          paddingに関しては上下左右どっちも適応される。
          インライン要素
          要素に含まれるコンテンツの大きさによって、その幅が決まる。横並びで存在することができる。
          （例）aタグ、bタグ、strongタグ、buttonタグ
          高さと幅を変更できない。
          margin適用が可能で上下への適用を行うことができない。左右はできる。
          paddingに関しては上下左右どっちも適応される。
          
          --}} 
        .all {
             
             }
 
        .card {
	             top: 50%;
               background-color:white;
               width:54%;
               height:100%;
               overflow: hidden;
               border-radius: 8px;
               box-shadow: 0 4px 15px rgba(0,0,0,.2);
             }
        {{-- CSSで中央寄せする方法
            左右の中央揃え  
            1. text-align: center;
            インライン要素（画像やテキスト）はこれでオッケー
          --}} 
         p
         {
          font-size:25px;
          font-weight:bold;
          margin-left:30px;
          margin-bottom:-3px;
          }
         .table {
          width:100%;
          margin:0 auto;
          margin-left:30px;
          margin-top:40px;
          }
        .new {
          margin:10px auto;
          
      
        }
        .input-update {
        width:75%;
        margin-left:30px;
        height:35px; 
        border-radius: 4px;
        border: 2px solid #13f1fc;
        
        }
        .input-update:focus
        { outline: none;
          border: 2px solid #13f1fc;
        }
       .update
      {
       height:37px;  
       width:58px;
       border-radius: 5px;
       margin-left:60px;
       color:#FF57B9;
       border: 2px solid #FF57B9;
       font-size:12px;
       font-weight:bold;
       background-color:white;

      }
      .update:hover 
      { 
       background-color:#FF57B9;
       color:white;
      }
      .updatebtn 
      { 
       height:40px;  
       width:60px;
       border-radius: 8px;
      }
      .ProductTable 
      {
        width:90%;
        border-collapse: separate;
        border-spacing: 30px 0px;
     }
      .taskname
      { 
      width: 40%;
      }

      .sakuseibi
      { 
      font-size:16px;
      }
      
    .th
     { 
       margin-left:90px;
      }
    .kousinn
      { 
       
      }

    .deletebtn 
      { 
       height:40px;  
       width:60px;
       border-radius: 8px;
       
       
      }
    .input
     {
        width:100%;
        height:20px; 
        border-radius: 4px;
        outline: solid 2px green;
        border-collapse: separate;
        
        }

         
        </style>
    
<body>
  <div class="all">
     <div class="card">
        <p>Todo List</p>
      <div class="new">
          <form action="/todo/update" method="POST" >
            @csrf
            @if (count($errors) > 0)
              <p>入力に問題があります</p>
            @endif
            <input type="text" class="input-update" value= "" name="name">
            <input type="submit" name="submit" value="追加" class="update" />
          </form>
      </div>
       <div class="table">
        <table class="ProductTable">
         @csrf 
         <tr>
            <th>作成日</th>
            <th class="taskname">タスク名</th>
            <th class="kousinn">更新</th>
            <th class="sakujyo">削除</th>
         </tr>
        @foreach ($tasks as $task)   
          <tr>
           <td class="sakuseibi">
             {{ $task->created_at }}
           </td> 
          <form action="{{ route('todo.new', [ 'id' => $task->id]) }}" method="POST"> 
            @csrf 
           <td>
            <input type="text" class="input" value= "{{ $task->name }}" name="name">  
           </td>
           <td>
            <button type="submit" class="updatebtn" >更新</button> 
           </td>
          </form> 
           <td>
            <form action="{{ route('todo.destroy', [ 'id' => $task->id]) }}" method="post"> 
             @csrf 
             <button type="submit" class="deletebtn">削除</button> 
            </form> 
           </td>
         </tr>
        @endforeach
       </table>
       </div> 
     </div>
  </div>
</body>
</html>