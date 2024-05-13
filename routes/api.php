<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group.|unique:users,email Enjoy building your API!
|
*/




// Public routes
Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::get('posts',[PostController::class,'getPosts']);
Route::get('posts/{slug}',[PostController::class,'getPostBySlug']);
Route::get('/client/posts',[PostController::class,'loadMorePost']);

	

Route::get('/count/posts',[PostController::class,'countPost']);
//protected
Route::group(['middleware'=>['auth:sanctum']],function(){

	
	Route::post('posts',[PostController::class,'store']);
	Route::put('posts/{id}',[PostController::class,'update']);
	Route::delete('posts/{id}',[PostController::class,'destroy']);
	Route::post('posts/upload-image',[PostController::class,'addImage']);
	Route::get('/check/user/loggedin',[AuthController::class,'userIsLoggedIn']);
	Route::post('logout',[AuthController::class,'logoutUser']);
});




// store
// update
// delete
// posts/upload-image

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
