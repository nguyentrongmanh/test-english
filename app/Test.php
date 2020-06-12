<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Test extends Model {
	protected $table = 'tests';
	protected $fillable = [
		'user_id',
		"listening_score",
		"reading_score",
		"total_score",
		"part_one_ids",
		"part_two_ids",
		"part_three_ids",
		"part_four_ids",
		"part_five_ids",
		"part_six_ids",
		"part_seven_ids",
		"true_answer_part_one_ids",
		"true_answer_part_two_ids",
		"true_answer_part_three_ids",
		"true_answer_part_four_ids",
		"true_answer_part_five_ids",
		"true_answer_part_six_ids",
		"true_answer_part_seven_ids",
		"part_one_score",
		"part_two_score",
		"part_three_score",
		"part_four_score",
		"part_five_score",
		"part_six_score",
		"part_seven_score",
		"complete_flg"
	];
	// public function questions() {
	// 	return $this->hasMany('App\Question');
	// }
	public function getFormatCreated() {
		return Carbon::createFromFormat("Y-m-d H:i:s", $this->created_at)->format("Y-m-d");
	}

	public function getListeningScore() {
		return ($this->part_one_score + $this->part_two_score + $this->part_three_score + $this->part_four_score);
	}
	public function getReadingScore() {
		return ($this->part_five_score + $this->part_six_score + $this->part_seven_score);
	}
}