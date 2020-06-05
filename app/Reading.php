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
	public function getFormatCreated() {
		return Carbon::createFromFormat("Y-m-d H:i:s", $this->created_at)->format("Y-m-d");
	}
}