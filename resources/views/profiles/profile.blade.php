<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8"'>
  <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
  <link rel='stylesheet' href="{{ asset('/css/style.css') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<img src="images/{{$myProfile->image}}">
<table class='table table-hover'>
      <tr>
        <th>UserName</th>
        <td>{{$myProfile->name}}<td>
      </tr>
      <tr>
        <th>MailAddress</th>
        <td>{{$myProfile->email}}<td>
      </tr>
      <tr>
        <th>Bio</th>
        <td>{{$myProfile->bio}}<td>
      </tr>
      <tr>
      <td>
        <button type="submit" class="btn btn-danger">変更画面へ</button>
      </td>
      </tr>
          @foreach($posts as $post)
     <td>
          <img class="logo" src="./images/{{$post->image}}" alt="DAWN">
        </td>
      <td>{{$post->name}}</td>
      <td>{{$post->post}}</td>
      <td>{{$post->created_at}}</td>
           @endforeach
    </table>
</body>
</html>
