<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8"'>
  <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
  <link rel='stylesheet' href="{{ asset('/css/style.css') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <div class='container'>
    <h1 class='page-header'>Laravelを使った投稿機能の実装</h1>
    <h2 class='page-header'>新しく投稿をする</h2>
    <form action="/post/create" method="post">
      @csrf
      <div class="form-group">
        <input type="text" name="newPost" class="form-control" placeholder="投稿内容">
      </div>
      <div class="pull-right submit-btn">
        <button type="submit" class="btn btn-success">追加</button>
      </div>
    </form>
  </div>

  <footer>
    <small>Laravel@dawn.curriculum</small>
  </footer>
</body>

</html>
