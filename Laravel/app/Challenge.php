<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $fillable = ['name', 'info', 'default_entry_fee'];

    public $timestamps = false;

}
