<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//insert
Route::post('/addItem',[
    'uses'=>'App\Http\Controllers\ItemsController@postItem'
]);

//get
Route::get('/getItem',[
      'uses'=>'App\Http\Controllers\ItemsController@getItem'

]);

//id eka dunnam ee data tika ganna
Route::get('/getItems/{id}',[
    'uses'=>'App\Http\Controllers\ItemsController@getItems'

]);
//delete
Route::delete('/deleteItem/{id}',[
    'uses'=>'App\Http\Controllers\ItemsController@deleteItem'

]);
//put

Route::put('/editItem/{id}',[
    'uses'=>'App\Http\Controllers\ItemsController@editItem'

]);