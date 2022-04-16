<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function AllReviews()
    {
        return view('all');
    }

    public function singleReview()
    {
        return view('single');
    }
}
