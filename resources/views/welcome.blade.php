@extends('layout')


<!-- Search form -->

<!-- search End -->

@section('main')
<!-- Blog List Start -->
<div class="container bg-white pt-5">
  @foreach ($reviews as $review)
   <div class="row blog-item px-3 pb-5">
        <div class="col-md-5">
            <img class="img-fluid mb-4 mb-md-0" src="{{$review->imagepath}}" alt="Image">
        </div>
        <div class="col-md-7">
            <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold">{{$review->title}}</h3>
            <div class="d-flex mb-3">
                <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i>{{$review->created_at-> diffForHumans()}}</small>
                <!-- <small class="mr-2 text-muted"><i class="fa fa-folder"></i> Web Design</small> -->
                <!-- <small class="mr-2 text-muted"><i class="fa fa-comments"></i> 15 Comments</small> -->
            </div>
            <p>
                {{$review->body}}
            </p>
            <a class="btn btn-link p-0" href="{{url('/reviews',$review)}}">Read More<i class="fa fa-angle-right"></i></a>
        </div>
    </div>
    @endforeach
    
</div>
<!-- Blog List End -->
@endsection