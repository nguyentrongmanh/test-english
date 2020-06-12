<?php

namespace App;

use Carbon\Carbon;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';

    protected $fillable = [
        'name', 'image', 'target', "address", "schedule", "description", "total_number",
        'fee', 'register_number', 'teacher_id', "close_flg", "start_date", "end_date",
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'class_registers', 'class_id')->withPivot('created_at');
    }

    public function getFormatCreated()
    {
        return Carbon::createFromFormat("Y-m-d H:i:s", $this->created_at)->format("Y-m-d");
    }

    public function getTeacher($teacherId)
    {
        $teacher = User::find($teacherId);
        return $teacher;
    }

}
