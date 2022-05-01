<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index( )
    {
        $reviews=Review::orderBy('created_at', 'desc')->limit(10)->get();
        return view('welcome',compact('reviews'));
    }
}
