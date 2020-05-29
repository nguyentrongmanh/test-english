<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reading extends Model {
	protected $table = 'readings';

	protected $fillable = [
		'part', 'number_of_questions', 'post',
	];
	public function questions() {
		return $this->hasMany('App\Question');
	}
}
