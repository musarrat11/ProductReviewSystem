<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function redirect(Request $request){
        if(Auth::id()){
            if(Auth::user()->usertype==0){
                $userid=Auth::user()->id;
                  if($request->search){
                    $reviews = Review::where([['title', 'like', '%' . $request->search . '%'], ['user_id',$userid]])
                    ->orWhere([['body', 'like', '%' . $request->search . '%'], ['user_id',$userid]])
                    ->get();
                }
                else{
                    $reviews=Review::where('user_id',$userid)->get();
                }
                 return view('user.home',compact('reviews'));
            }
            else{
                if($request->search){
                    $reviews = Review::where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('body', 'like', '%' . $request->search . '%')->get();
                }
            else{
                $reviews=Review::all();
            }
                return view('admin.home',compact('reviews'));
            }
        }
        else{
            return redirect()->back();
        }
    }
    
    public function index(){
        return view('user.home');
    }
}


