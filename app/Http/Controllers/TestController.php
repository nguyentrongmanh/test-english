<?php

namespace App\Http\Controllers;
use App\Reading;
use App\Listening;
use App\Test;
use App\Enums\ToeicPart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function start(Request $request) {
		$user = $this->get_login_user();
		$partOneIds = Listening::where("part", ToeicPart::PART_ONE)
			->select("id")
			->inRandomOrder()
			->limit(3)
			->pluck("id")
			->toArray();
		$partTwoIds = Listening::where("part", ToeicPart::PART_TWO)
			->select("id")
			->inRandomOrder()
			->limit(5)
			->pluck("id")
			->toArray();
		$partThreeIds = Listening::where("part", ToeicPart::PART_THREE)
			->select("id")
			->inRandomOrder()
			->limit(2)
			->pluck("id")
			->toArray();
		$partFourIds = Listening::where("part", ToeicPart::PART_FOUR)
			->select("id")
			->inRandomOrder()
			->limit(2)
			->pluck("id")
			->toArray();
		$partFiveIds = Reading::where("part", ToeicPart::PART_FIVE)
			->select("id")
			->inRandomOrder()
			->limit(5)
			->pluck("id")
			->toArray();
		$partSixIds = Reading::where("part", ToeicPart::PART_SIX)
			->select("id")
			->inRandomOrder()
			->limit(1)
			->pluck("id")
			->toArray();
			$partSevenIds = [];
		$partSevenIds = array_merge($partSevenIds, Reading::where("part", ToeicPart::PART_SEVEN)
			->where("number_of_questions",2)
			->select("id")
			->inRandomOrder()
			->limit(1)
			->pluck("id")
			->toArray());
		$partSevenIds = array_merge($partSevenIds, Reading::where("part", ToeicPart::PART_SEVEN)
			->where("number_of_questions",4)
			->select("id")
			->inRandomOrder()
			->limit(1)
			->pluck("id")
			->toArray());
		$partSevenIds = array_merge($partSevenIds, Reading::where("part", ToeicPart::PART_SEVEN)
			->where("number_of_questions",5)
			->select("id")
			->inRandomOrder()
			->limit(1)
			->pluck("id")
			->toArray());
		try {
			$test = Test::Create([
				'user_id' => $user->id,
				'part_one_ids' => implode(",", $partOneIds),
				'part_two_ids' => implode(",", $partTwoIds),
				'part_three_ids' => implode(",", $partThreeIds),
				'part_four_ids' => implode(",", $partFourIds),
				'part_five_ids' => implode(",", $partFiveIds),
				'part_six_ids' => implode(",", $partSixIds),
				'part_seven_ids' => implode(",", $partSevenIds),
				"complete_flg" => false
			]);
			$request->session()->put('startTest', $test);
		} catch (\Exception $e) {
			return redirect()->route("home");
		}
		return view('intro');
	}

	public function partOne(Request $request) {
		$startTest = $request->session()->get('startTest');
		if (empty($startTest)) {
			return redirect()->route("home");
		}
		$partOneIds = explode(",", $startTest->part_one_ids);
		$listeningQuestions = Listening::whereIn("id", $partOneIds)
			->get();
		$startIndex = 1;
		return view('test.part_one', [
			"listeningQuestions" => $listeningQuestions,
			"startIndex" => $startIndex,
		]);
	}

	public function partTwo(Request $request) {
		$startTest = $request->session()->get('startTest');
		if (empty($startTest)) {
			return redirect()->route("home");
		}
		$trueAnswerPartOneIds = $request->input("true_answer_part_one_ids");
		try {
			$startTest->true_answer_part_one_ids = $trueAnswerPartOneIds;
			$startTest->part_one_score = $request->input('score');
			$startTest->save();
		} catch (\Exception $e) {
			Log::info($e);
			return redirect()->route("home");
		}

		$partTwoIds = explode(",", $startTest->part_two_ids);
		$listeningQuestions = Listening::whereIn("id", $partTwoIds)
			->get();
		$startIndex = $request->input("start_index");
		$countDown = $request->input("count_down");
		return view('test.part_two', [
			"listeningQuestions" => $listeningQuestions,
			"startIndex" => $startIndex,
			"countDown" => $countDown,
		]);
	}

	public function partThree(Request $request) {
		$startTest = $request->session()->get('startTest');
		if (empty($startTest)) {
			return redirect()->route("home");
		}
		$trueAnswerPartTwoIds = $request->input("true_answer_part_two_ids");
		try {
			$startTest->true_answer_part_two_ids = $trueAnswerPartTwoIds;
			$startTest->part_two_score = $request->input('score');
			$startTest->save();
		} catch (\Throwable $th) {
			return redirect()->route("home");
		}

		$ids = explode(",", $startTest->part_three_ids);
		$listeningQuestions = Listening::whereIn("id", $ids)
			->get();
		$startIndex = $request->input("start_index");
		$countDown = $request->input("count_down");
		return view('test.part_three', [
			"listeningQuestions" => $listeningQuestions,
			"startIndex" => $startIndex,
			"title" => "Part III: Short Conversations",
			"countDown" => $countDown,
		]);
	}

	public function partFour(Request $request) {
		$startTest = $request->session()->get('startTest');
		if (empty($startTest)) {
			return redirect()->route("home");
		}
		$trueAnswerIds = $request->input("true_answer_part_three_ids");
		try {
			$startTest->true_answer_part_three_ids = $trueAnswerIds;
			$startTest->part_three_score = $request->input('score');
			$startTest->save();
		} catch (\Throwable $th) {
			return redirect()->route("home");
		}

		$ids = explode(",", $startTest->part_four_ids);
		$listeningQuestions = Listening::whereIn("id", $ids)
			->get();
		$startIndex = $request->input("start_index");
		$countDown = $request->input("count_down");
		return view('test.part_four', [
			"listeningQuestions" => $listeningQuestions,
			"startIndex" => $startIndex,
			"countDown" => $countDown,
			"title" => "Part IV: Short Talks"
		]);
	}
		
	public function partFive(Request $request) {
		$startTest = $request->session()->get('startTest');
		if (empty($startTest)) {
			return redirect()->route("home");
		}
		$trueAnswerIds = $request->input("true_answer_part_four_ids");
		try {
			$startTest->true_answer_part_four_ids = $trueAnswerIds;
			$startTest->part_four_score = $request->input('score');
			$startTest->save();
		} catch (\Throwable $th) {
			return redirect()->route("home");
		}

		$ids = explode(",", $startTest->part_five_ids);
		$readingQuestions = Reading::whereIn("id", $ids)
			->get();
		$startIndex = $request->input("start_index");
		$countDown = $request->input("count_down");
		return view('test.part_five', [
			"readingQuestions" => $readingQuestions,
			"startIndex" => $startIndex,
			"countDown" => $countDown,
		]);
	}

	public function partSix(Request $request) {
		$startTest = $request->session()->get('startTest');
		if (empty($startTest)) {
			return redirect()->route("home");
		}
		$trueAnswerIds = $request->input("true_answer_part_five_ids");
		try {
			$startTest->true_answer_part_five_ids = $trueAnswerIds;
			$startTest->part_five_score = $request->input('score');
			$startTest->save();
		} catch (\Throwable $th) {
			return redirect()->route("home");
		}

		$ids = explode(",", $startTest->part_six_ids);
		$readingQuestions = Reading::whereIn("id", $ids)
			->get();
		$startIndex = $request->input("start_index");
		$countDown = $request->input("count_down");
		return view('test.part_six', [
			"readingQuestions" => $readingQuestions,
			"startIndex" => $startIndex,
			"countDown" => $countDown,
		]);
	}

	public function partSeven(Request $request) {
		$startTest = $request->session()->get('startTest');
		if (empty($startTest)) {
			return redirect()->route("home");
		}
		$trueAnswerIds = $request->input("true_answer_part_six_ids");
		try {
			$startTest->true_answer_part_six_ids = $trueAnswerIds;
			$startTest->part_six_score = $request->input('score');
			$startTest->save();
		} catch (\Throwable $th) {
			return redirect()->route("home");
		}

		$ids = explode(",", $startTest->part_seven_ids);
		$readingQuestions = Reading::whereIn("id", $ids)
			->get();
		$startIndex = $request->input("start_index");
		$countDown = $request->input("count_down");
		return view('test.part_seven', [
			"readingQuestions" => $readingQuestions,
			"startIndex" => $startIndex,
			"countDown" => $countDown,
		]);
	}

	public function result(Request $request) {
		$startTest = $request->session()->get('startTest');
		if (empty($startTest)) {
			return redirect()->route("home");
		}
		$trueAnswerIds = $request->input("true_answer_part_seven_ids");
		try {
			$startTest->true_answer_part_seven_ids = $trueAnswerIds;
			$startTest->part_seven_score = $request->input('score');
			$startTest->complete_flg = true;
			$startTest->save();
		} catch (\Throwable $th) {
			return redirect()->route("home");
		}

		$request->session()->pull("startTest");
		return view('test.result', [
			"test" => $startTest
		]);
	}

	public function partOneResult($id) {
		$test = Test::find($id);
		$user = $this->get_login_user();
		if ($test->user_id != $user->id) {
			return redirect()->back();
		}
		$ids = explode(",", $test->part_one_ids);
		$listenings = Listening::whereIn('id', $ids)
			->get();
		$startIndex = 1;
		$trueAnswersIds = explode(",", $test->true_answer_part_one_ids);
		return view('test.part_one_result', [
			"listenings" => $listenings,
			"startIndex" => $startIndex,
			"trueAnswersIds" => $trueAnswersIds,
			"test" => $test
		]);
	}

	public function partTwoResult(Request $request, $id) {
		$queryParams = $request->query();
		$startIndex = $queryParams["startIndex"] ?? 1;
		$test = Test::find($id);
		$user = $this->get_login_user();
		if ($test->user_id != $user->id) {
			return redirect()->back();
		}
		$ids = explode(",", $test->part_two_ids);
		$listenings = Listening::whereIn('id', $ids)
			->get();
		$trueAnswersIds = explode(",", $test->true_answer_part_two_ids);
		return view('test.part_two_result', [
			"listenings" => $listenings,
			"startIndex" => $startIndex,
			"trueAnswersIds" => $trueAnswersIds,
			"test" => $test
		]);
	}

	public function partThreeResult(Request $request, $id) {
		$queryParams = $request->query();
		$startIndex = $queryParams["startIndex"] ?? 1;
		$test = Test::find($id);
		$user = $this->get_login_user();
		if ($test->user_id != $user->id) {
			return redirect()->back();
		}
		$ids = explode(",", $test->part_three_ids);
		$listenings = Listening::whereIn('id', $ids)
			->get();
		$trueAnswersIds = explode(",", $test->true_answer_part_three_ids);
		return view('test.part_three_result', [
			"listenings" => $listenings,
			"startIndex" => $startIndex,
			"trueAnswersIds" => $trueAnswersIds,
			"test" => $test
		]);
	}

	public function partFourResult(Request $request, $id) {
		$queryParams = $request->query();
		$startIndex = $queryParams["startIndex"] ?? 1;
		$test = Test::find($id);
		$user = $this->get_login_user();
		if ($test->user_id != $user->id) {
			return redirect()->back();
		}
		$ids = explode(",", $test->part_four_ids);
		$listenings = Listening::whereIn('id', $ids)
			->get();
		$trueAnswersIds = explode(",", $test->true_answer_part_four_ids);
		return view('test.part_four_result', [
			"listenings" => $listenings,
			"startIndex" => $startIndex,
			"trueAnswersIds" => $trueAnswersIds,
			"test" => $test
		]);
	}

	public function partFiveResult(Request $request, $id) {
		$queryParams = $request->query();
		$startIndex = $queryParams["startIndex"] ?? 1;
		$test = Test::find($id);
		$user = $this->get_login_user();
		if ($test->user_id != $user->id) {
			return redirect()->back();
		}
		$ids = explode(",", $test->part_five_ids);
		$readings = Reading::whereIn('id', $ids)
			->get();
		$trueAnswersIds = explode(",", $test->true_answer_part_five_ids);
		return view('test.part_five_result', [
			"readings" => $readings,
			"startIndex" => $startIndex,
			"trueAnswersIds" => $trueAnswersIds,
			"test" => $test
		]);
	}

	public function partSixResult(Request $request, $id) {
		$queryParams = $request->query();
		$startIndex = $queryParams["startIndex"] ?? 1;
		$test = Test::find($id);
		$user = $this->get_login_user();
		if ($test->user_id != $user->id) {
			return redirect()->back();
		}
		$ids = explode(",", $test->part_six_ids);
		$readings = Reading::whereIn('id', $ids)
			->get();
		$trueAnswersIds = explode(",", $test->true_answer_part_six_ids);
		return view('test.part_six_result', [
			"readings" => $readings,
			"startIndex" => $startIndex,
			"trueAnswersIds" => $trueAnswersIds,
			"test" => $test
		]);
	}

	public function partSevenResult(Request $request, $id) {
		$queryParams = $request->query();
		$startIndex = $queryParams["startIndex"] ?? 1;
		$test = Test::find($id);
		$user = $this->get_login_user();
		if ($test->user_id != $user->id) {
			return redirect()->back();
		}
		$ids = explode(",", $test->part_seven_ids);
		$readings = Reading::whereIn('id', $ids)
			->get();
		$trueAnswersIds = explode(",", $test->true_answer_part_seven_ids);
		return view('test.part_seven_result', [
			"readings" => $readings,
			"startIndex" => $startIndex,
			"trueAnswersIds" => $trueAnswersIds,
			"test" => $test
		]);
	}
}