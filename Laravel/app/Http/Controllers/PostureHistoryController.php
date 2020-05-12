<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostureHistoryController extends Controller
{
    public function index(){
      $history = \App\PostureHistory::get();

      return view('stats.stats2', ['data'=>$history]);
    }

    public function todayAjax(Request $request){
      // $parameter1 = $request->param1;
      $history = \App\PostureHistory::get();
      
      // $view = View::make('stats.today', ['parameter1' => $parameter1]);
      $view = view('stats.today', ['data'=>$history]);
  
      // return response()->json(['status' => 'success', 'data' => $view]);
      return $view;
      // return response($view, 200, ['data'=>'history']);
    }

    public function weekAjax(Request $request){
      $view = view('stats.week');
    }

    public function monthAjax(Request $request){
      $view = view('stats.month');
    }
}
