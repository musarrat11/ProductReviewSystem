<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ReviewController extends Controller
{
    //authentication
    public function __construct()
    {
       $this->middleware('auth')->except(['AllReviews', 'singleReview']);
    }
    //show all reviews
    public function AllReviews(Request $request)
    {
        //search
        if($request->search){
            $reviews = Review::where('title', 'like', '%' . $request->search . '%')
            ->orWhere('body', 'like', '%' . $request->search . '%')->get();
        }
    else{
        $reviews=Review::all();
    }
    return view('reviews',compact('reviews'));
}
    //show review details
    public function singleReview($id)
    {
        $review = Review::find($id);
        $comment = DB::table('comments')
                 ->where('review_id', '=', $id)
                 ->get();
        return view('single',compact('review','comment'));
    }

    //createreview view
    public function ShowCreateReview()
    {
        return view('user.create-post');
    }
    //createreview db
    public function CreateReview(Request $request)
    {
      //get data
      $title=$request->input('title');
      $slug=Str::slug($title, '-');
      $user_id = Auth::user()->id;
      $body = $request->input('body');

      $imagePath = 'storage/' . $request->file('image')->store('ProductImages', 'public');
      //store data
      $data =new Review();
      $data->title=$title;
      $data->body = $body;
      $data->slug = $slug;
      $data->user_id = $user_id;
      $data->imagePath = $imagePath;
      $data->save();
      return redirect('/home');
    }

    //editreview view
    public function ShowEditReview($id)
    {
        $review = Review::find($id);
        return view('user.edit-post',compact('review'));
    }
    //editreview db
    public function EditReview(Request $request, Review $review)
    {
        //getdata
        $title=$request->input('title');
        $slug=Str::slug($title, '-');
        $postid = $review->id;
        $body = $request->input('body');
        $image=$request->file('image');
        if($image==NULL){
            $imagePath = $review->imagepath;
        }
        else{
            $imagePath = 'storage/' . $request->file('image')->store('ProductImages', 'public');
        }
        
      //store data
      $review->title=$title;
      $review->body = $body;
      $review->slug = $slug;
      $review->imagePath = $imagePath;

      $review->save();
      return redirect('/home');
    }

    public function ShowDeleteReview($id)
    {
        $review = Review::find($id);
        return view('user.delete-post',compact('review'));
    }
    public function DeleteReview(Review $review)
    {
        $review -> delete();
        return redirect('/home');
    }
    


}
