<?php

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

Route::get('/', function () {
    return view('main');
});

Route::get('stats', 'Daily_statsController@index');

Route::resource('products', 'ProductsController');

Route::resource('challenge', 'ChallengesController');
Route::get('joinedChallenge', function(){
  return view('joinedChallenge');
})->name('joinedChallenge');

Route::resource('qna', 'QuestionsController');
