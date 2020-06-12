<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Listening extends Model
{
	protected $table = 'listenings';
	protected $fillable = [
		'part', 'audio', 'main_img',
	];
	public function questions() {
		return $this->hasMany('App\Question');
	}

	public function getFormatCreated() {
		return Carbon::createFromFormat("Y-m-d H:i:s", $this->created_at)->format("Y-m-d");
	}
}