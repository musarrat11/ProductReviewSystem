<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index( )
    {
        if(Auth::id()){
            return redirect()->back();
        }
        else{
        $reviews=Review::orderBy('created_at', 'desc')->limit(10)->get();
        return view('welcome',compact('reviews'));
        }
    }
}
