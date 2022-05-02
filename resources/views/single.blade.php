@extends('layout')

@section('single')
<!-- Blog Detail Start -->
<div class="container py-5 px-2 bg-white">
    <div class="row px-4">
        <div class="col-12">
            <img class="img-fluid mb-4" src="{{asset($review->imagepath)}}" alt="Image">
            <h2 class="mb-3 font-weight-bold">{{$review->title}}</h2>
            <div class="d-flex">
                <p class="mr-3 text-muted"><i class="fa fa-calendar-alt"></i> {{$review->created_at-> diffForHumans()}}</p>
                <!-- <p class="mr-3 text-muted"><i class="fa fa-folder"></i> Web Design</p>
                <p class="mr-3 text-muted"><i class="fa fa-comments"></i> 15 Comments</p> -->
            </div>
            <p>{{$review->body}}</p>
        </div>

        <div class="col-12 py-4">
            <h3 class="mb-4 font-weight-bold">Comments</h3>
            
            <div class="media mb-4">
                <div class="media-body">
                    <h3>Ryan Malik<small></small></h3>
                    <p>good product</p>
                </div>
            </div>
            <div class="media mb-4">
                <div class="media-body">
                    <h3>Soniya Shikder<small></small></h3>
                    <p>Didn't like that</p>
                </div>
            </div>
            <!--  -->
        </div>
        @auth
        <div class="col-12">
            <h3 class="mb-4 font-weight-bold">Leave a comment</h3>
            <form method="get" action="{{url('/reviews',$review)}}">
                @method('post')
                @csrf
                <div class="form-group">
                    <label for="formGroupExampleInput">comment</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="comment" placeholder="">
                </div>
                <div class="form-group">
                    <input type="submit" value="Leave Comment" class="btn btn-primary">
                </div>
            </form>
        </div>
        @endauth
    </div>
    <!-- Blog Detail End -->

    @endsection