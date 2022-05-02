<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function redirect()
    {
      return redirect()->back();
    }
    
    public function CreateComment (Request $request, $review_id)
    {
      //get data
      $user_id = Auth::user()->id;
      $comment = $request->input('comment');
      dd($review_id); 
      //store data
    //   $data =new Comment();
    //   $data->comment=$comment;
    //   $data->body = $body;
    //   $data->slug = $slug;
    //   $data->user_id = $user_id;
    //   $data->imagePath = $imagePath;
    //   $data->save();
      return redirect('/home');
    }
}
