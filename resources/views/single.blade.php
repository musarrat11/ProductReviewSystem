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
            @foreach($comment as $comment)
            <div class="media mb-4">
                <div class="media-body">
                    <h3>{{$comment->user_id}}<small><i>{}</i></small></h3>
                    <p>{{$comment->comment}}</p>
                </div>
            </div>
            @endforeach
        </div>
    @auth
        <div class="col-12">
            <h3 class="mb-4 font-weight-bold">Leave a comment</h3>
            <form method="POST" action="{{url('/reviews',$review)}}">
                @method('post')
                @csrf
                <div class="form-group">
                    <label for="message">Comment</label>
                    <textarea id="message" name="comment" class="form-control"></textarea>
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