<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daily_stat extends Model
{
  protected $fillable = [
    'user_id', 'date', 'good_time', 'good_rate', 'bad_time', 'bad_rate', 'seat_time_sum', 'longest_seat_time',
  ];

  protected $dates=['date'];

  public function user(){
    return $this->belongsTo('App\User');
  }

}
