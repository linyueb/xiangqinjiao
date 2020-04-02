<?php

use App\Http\Middleware\UserAuth;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware'=>UserAuth::class],function(){

});

Route::any('test','TestController@test');
Route::get('index','TestController@index');

Route::group(['prefix'=>'v1'],function(){
    Route::post('login','V1\AuthController@login');
    Route::post('register','V1\AuthController@register');
    Route::get('topics','V1\TopicController@index');
    Route::get('comments','V1\CommentController@index');
    Route::group(['middleware'=>UserAuth::class],function(){
        Route::post('topics','V1\TopicController@store');
        Route::post('comments','V1\CommentController@store');
        Route::post('upload','V1\FileController@upload');
    });
});