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

Route::get('stats', 'PostureHistoryController@index');
Route::get('stats/today', 'PostureHistoryController@todayAjax'); // today 통계 ajax
Route::get('stats/week', 'PostureHistoryController@weekAjax'); // week 통계 ajax
Route::get('stats/month', 'PostureHistoryController@monthAjax'); // month 통계 ajax

Route::resource('products', 'ProductsController');

Route::resource('challenge', 'ChallengesController');
Route::get('joinedChallenge', function(){
  return view('joinedChallenge');
})->name('joinedChallenge');

Route::resource('qna', 'QuestionsController');

Route::get('/test', function() {  // siqtheme 라우팅
	return view('test');
});
