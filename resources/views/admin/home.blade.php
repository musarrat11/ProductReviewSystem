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

    <div class="wrapper">
        <x-app-layout>
            <div class="sidebar">

                <div class="sidebar-text d-flex flex-column h-100 justify-content-center text-center">
                    <!-- <img class="mx-auto d-block w-75 bg-primary img-fluid rounded-circle mb-4 p-3" src="img/profile.jpg" alt="Image"> -->
                    <h1 class="font-weight-bold">FindBestReview</h1>
                    <!-- navbar start -->
                    <nav class="nav flex-column">

                        @guest
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                        <a class="nav-link" href="/reviews">Reviews</a>
                        <a class="nav-link" href="/register">Registration</a>
                        <a class="nav-link" href="/login">Login</a>
                        @endguest
                        @auth
                        <a class="nav-link active" aria-current="page" href="/home">Home</a>
                        <a class="nav-link" href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                            {{ __('Profile') }}</a>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <a class="nav-link" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                        @endauth

                    </nav>
                    <!--navbar end  -->
                </div>
                <div class="sidebar-icon d-flex flex-column h-100 justify-content-center text-right">
                    <i class="fas fa-2x fa-angle-double-right text-primary"></i>
                </div>

            </div>
            <div class="content">
                <!-- Search form -->
                <form method="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="search" name="search">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Button</button>
                    </div>
                </form>
                <!-- search End -->
                <!--  -->
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
                <!--  -->
                <div class="container py-4 bg-secondary text-center">
                    <p class="m-0 text-white">
                        &copy; <a class="text-white font-weight-bold" href="#">FindBestReviews</a>. All Rights Reserved.</a>
                    </p>
                </div>
                <!-- Footer End -->
            </div>
        </x-app-layout>

    </div>

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>