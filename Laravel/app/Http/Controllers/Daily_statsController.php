<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Daily_statsController extends Controller
{
    public function index(){
      $daily_stat = (\App\Daily_stat::where('user_id', 1)->get())[0];
      $data = [];
      return view('stats', compact('daily_stat'))->with('menuName', '통계');
    }
}
