@extends('layout')

@section('main')
<div>
<form method="POST" action="{{url('/home')}}" enctype="multipart/form-data">
    @csrf
<div class="form-group">
    <label for="formGroupExampleInput">Title</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="title" placeholder="">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Write here</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="body" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Upload image</label>
    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Post</button>
    </div>
  </div>
</form>
</div>
@endsection