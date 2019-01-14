<?php

use Illuminate\Http\Request;
use App\Http\Middleware\CheckToken;

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

Route::post('/user', function (Request $request) {
//    return $request->user();
    return 123;
})->middleware(CheckToken::class);

Route::post('excel/import','Api\ExcelController@import');
Route::post('addPost','Api\SearchController@addPost');
Route::post('updatePost','Api\SearchController@updatePost');
Route::post('deletePost','Api\SearchController@deletePost');
Route::post('searchPost','Api\SearchController@searchPost');
