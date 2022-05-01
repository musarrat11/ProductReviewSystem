<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function redirect(){
        if(Auth::id()){
            if(Auth::user()->usertype==0){
                $userid=Auth::user()->id;
                //dd($userid);
                 $reviews=Review::where('user_id',$userid)->get();
                 //$reviews= DB::table('reviews')->where('user_id', $userid)->get();
                 //dd($reviews);
                 return view('user.home',compact('reviews'));
                //return view('user.home');
            }
            else{
                return view('admin.home');
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


