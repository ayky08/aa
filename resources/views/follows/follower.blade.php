<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8"'>
  <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
  <link rel='stylesheet' href="{{ asset('/css/style.css') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

@foreach($userIcons as $userIcon)
<img src="images/{{$userIcon->image}}">
@endforeach

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
    </tr>
    @endforeach
  </table>


</body>
</html>
