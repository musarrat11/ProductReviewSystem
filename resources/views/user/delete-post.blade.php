<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>Bloggy - Personal Blog Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:300;400;600;700;800&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
    </head>
<body>
<div class="card text-center">
  <div class="card-header"></div>
  <div class="card-body">
    <h5 class="card-title">Delete post for {{$review->title}}</h5>
    <p class="card-text">You sure want to delete this?</p>
    <a href="/home" class="btn btn-primary">close</a>
    <form method="POST"action="{{url('/reviews',$review)}}">
    @method('delete')
    @csrf
    <button type="submit"class="btn btn-danger">delete</button>
  </form>
  </div>
  <div class="card-footer"></div>
</div>
</body>
</html>