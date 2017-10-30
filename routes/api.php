<?php

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
header("Access-Control-Allow-Origin: *");
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/accesslog', "AccesslogController@index");
Route::post('/upload_attendance', "AccesslogController@download");
Route::get("/check_connection", "TestController@index");