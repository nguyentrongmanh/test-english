<?php

namespace App\Http\Controllers;
use App\Reading;
use App\Enums\ToeicPart;

class TestController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		// $this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function intro() {
		return view('intro');
	}

	public function partFive() {
		$partFiveQuestions = Reading::where("part", ToeicPart::PART_FIVE)
			->inRandomOrder()
			->limit(2)
			->get();
		$startIndex = 5;
		return view('test.part_five', [
			"partFiveQuestions" => $partFiveQuestions,
			"startIndex" => $startIndex
		]);
	}

	public function partSix() {
		$partSixQuestions = Reading::where("part", ToeicPart::PART_SIX)
			->inRandomOrder()
			->limit(2)
			->get();
		$startIndex = 5;
		return view('test.part_six', [
			"partSixQuestions" => $partSixQuestions,
			"startIndex" => $startIndex
		]);
	}

	public function partSeven() {
		$partSevenQuestions = Reading::where("part", ToeicPart::PART_SEVEN)
			->inRandomOrder()
			->limit(2)
			->get();
		$startIndex = 5;
		return view('test.part_seven', [
			"partSevenQuestions" => $partSevenQuestions,
			"startIndex" => $startIndex
		]);
	}

	public function result() {
		return view('test.result');
	}
}