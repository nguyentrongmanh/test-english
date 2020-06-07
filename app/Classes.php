<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Classes extends Model
{
    protected $table = 'classes';

    protected $fillable = [
        'name', 'image', 'target', "address", "schedule", "description", "total_number",
        'fee', 'register_number', 'teacher_id', "close_flg", "start_date", "end_date"
    ];

    public function teacher()
    {
        return $this->belongsTo('App\User', 'teacher_id');
    }

    public function getTeacher($teacherId)
    {
        $teacher = User::find($teacherId);
        return $teacher;
    }

}