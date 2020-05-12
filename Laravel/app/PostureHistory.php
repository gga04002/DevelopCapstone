<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostureHistory extends Model
{
    public $fillable = ['user_id', 'good_time', 'cross_left_leg_time', 'cross_right_leg_time', 'edge_lean_time', 'lean_toward_time', 'lean_left_time', 'lean_right_time', 'timestamp'];

}
