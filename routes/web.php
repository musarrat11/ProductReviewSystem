<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


//welcome page-->vc
Route::get('/',[WelcomeController::class,'index']);

//Allreviews---->vc
Route::get('/reviews',[ReviewController::class,'AllReviews']);

//single review page-->vc
Route::get('/reviews/single',[ReviewController::class,'singleReview']);