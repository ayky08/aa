<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SNS</title>
  <link rel="stylesheet" href="./css/reset.css">
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
  <header>
    <img class="logo" src="./images/main_logo.png" alt="DAWN">
  </header>
  <div class="container">
    <form action="/create" method="post">
      @csrf
      <p class="text">
                    新規投稿登録
        </p>
      <div class="ct-block">
        <input type="text" name="newPost" placeholder="投稿を入力" class="form-name">
      </div>

      <input class="send-button" type="submit" value="投稿する">
    </form>
    <h2 class='page-header'>投稿一覧</h2>
    <table class='table table-hover'>
      <tr>
        <th></th>
        <th>投稿No</th>
        <th>投稿内容</th>
        <th>投稿日時</th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
      @foreach($posts as $post)
      <tr>
        <td>
          <img class="logo" src="./images/{{$post->image}}" alt="DAWN">
        </td>
      <td>{{$post->name}}</td>
      <td>{{$post->post}}</td>
      <td>{{$post->created_at}}</td>
        <td>
          <a class="btn btn-primary" href="/post/{{ $post->id }}/update-form">更新</a>
        </td>
      <td>
        <form action="/post/delete" method="post" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
          @method('DELETE')
          @csrf
          <input type="hidden" name="id" value="{{ $post->id }}">
          <button type="submit" class="btn btn-danger">削除</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
</div>
</body>
</html>
