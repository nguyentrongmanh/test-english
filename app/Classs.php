<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classs extends Model
{
    protected $table = 'classes';

    public function teacher()
    {
        return $this->belongsTo('App\User', 'teacher_id');
    }
}
