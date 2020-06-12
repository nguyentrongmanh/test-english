<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = [
        'question', 
        'answer', 
        'listening_id', 
        'reading_id', 
        "option_a", 
        "option_b",
        "option_c",
        "option_d",
        "explain",
	];
	public function getFormatCreated() {
		return Carbon::createFromFormat("Y-m-d H:i:s", $this->created_at)->format("Y-m-d");
	}
}