<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Join_challenge extends Model
{
    public $fillable = ['challenge_id', 'user_id', 'start_date', 'end_date', 'entry_fee', 'good_rate',
  'achivement_rate'];

    
}
