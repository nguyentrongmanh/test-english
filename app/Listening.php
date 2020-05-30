<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listening extends Model
{
	protected $table = 'listenings';
	protected $fillable = [
		'part', 'audio', 'main_img',
	];
	public function questions() {
		return $this->hasMany('App\Question');
	}
}