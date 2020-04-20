<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'user_id','question_title', 'question_content',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
