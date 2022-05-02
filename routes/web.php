<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
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
Route::any('/',[WelcomeController::class,'index'])->withoutMiddleware(['/home']);

//to comment
Route::post('/reviews/{$review}',[CommentController::class,'CreateComment']);


//Allreviews---->vc
Route::get('/reviews',[ReviewController::class,'AllReviews']);

//single review page-->vc
Route::get('/reviews/{review:slug}',[ReviewController::class,'singleReview']);

//dasboard for admin and user
Route::any('/home',[HomeController::class,'redirect']);

//create post for user
Route::get('/user/create',[ReviewController::class,'ShowCreateReview']);//->middleware('auth');
Route::post('/home',[ReviewController::class,'CreateReview']);//->middleware('auth');

//edit post for user
Route::get('/reviews/edit/{review:slug}',[ReviewController::class,'ShowEditReview']);
Route::put('/reviews/{review}',[ReviewController::class,'EditReview']);

//delete post for user
Route::get('/reviews/delete/{review}',[ReviewController::class,'ShowDeleteReview']);
Route::delete('/reviews/{review}',[ReviewController::class,'DeleteReview']);



//after jetstream
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
