<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8"'>
  <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
  <link rel='stylesheet' href="{{ asset('/css/style.css') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<form action="/search" method="post">
      @csrf
      <p class="text">
                    ユーザー検索
        </p>
      <div class="ct-block">
        <input type="text" name="keyword" placeholder="ユーザー名を入力" class="form-name">
      </div>
      <input class="send-button" type="image" src="./images/search.png">
    </form>

    <div>
      @foreach($users as $user)
      <div>
      {{$user->name}}
      @if(!($follows->contains('user_id', $user->id)))
      <form action="/follow/create" method="post">
      @csrf

        <input type="hidden" name="id" value="{{$user->id}}">
        <input type="submit" value="フォローする">
      </form>
      @else
      <form action="/follow/delete" method="post">
      @csrf
        <input type="hidden" name="id" value="{{$user->id}}">
        <input type="submit" value="フォロー外す">
      </form>
      @endif
      </div>
      @endforeach
      </div>
      </div>
      </div>
    </div>
</body>
