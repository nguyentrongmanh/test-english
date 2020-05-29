<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ToeicPart;
use App\Http\Controllers\Controller;
use App\Question;
use App\Reading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReadingsController extends Controller {
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
	public function index(Request $request) {
		$queryParams = $request->query();
		$part = $queryParams["part"] ?? ToeicPart::PART_FIVE;
		$readingQuestions = Reading::where("part", $part)
			->get();
		return view('admin.readings.index', [
			"readingQuestions" => $readingQuestions,
		]);
	}

	public function getCreate(Request $request) {
		return view('admin.readings.add');
	}

	public function create(Request $request) {
		$data = $request->all();
		$result = true;
		switch ($data['part']) {
		case ToeicPart::PART_SEVEN:
			$result = $this->createPartSeven($data);
			break;
		case ToeicPart::PART_FIVE:
			$result = $this->createPartFive($data);
			break;
		case ToeicPart::PART_SIX:
			$result = $this->createPartSix($data);
			break;

		default:
			# code...
			break;
		}

		if ($result) {
			return redirect()->route('index-reading')->with('success', __('success'));
		}
		return redirect()->route('create-reading')->with('error', __('error'));
	}

	protected function createPartFive($data) {
		try {
			$newPartFive = Reading::create([
				'part' => ToeicPart::PART_FIVE,
				"number_of_questions" => 1,
			]);
			$questionData = array_shift($data['questions']);
			$questionData['reading_id'] = $newPartFive->id;
			$newQuestion = Question::create($questionData);
			return true;
		} catch (\Exception $e) {
			Log::info($e);
			return false;
		}
	}

	protected function createPartSeven($data) {
		try {
			$questionData = $data['questions'];

			$newPartSeven = Reading::create([
				'part' => ToeicPart::PART_SEVEN,
				"number_of_questions" => count($questionData),
				"post" => $data["post"],
			]);

			foreach ($questionData as $key => $value) {
				$questionData[$key]["reading_id"] = $newPartSeven->id;
			}
			$newQuestions = Question::insert($questionData);
			return true;
		} catch (\Exception $e) {
			Log::info($e);
			return false;
		}
	}

	protected function createPartSix($data) {
		try {
			$questionData = $data['questions'];
			$newPartSeven = Reading::create([
				'part' => ToeicPart::PART_SIX,
				"number_of_questions" => count($questionData),
				"post" => $data["post"],
			]);

			foreach ($questionData as $key => $value) {
				$questionData[$key]["reading_id"] = $newPartSeven->id;
			}
			$newQuestions = Question::insert($questionData);
			return true;
		} catch (\Exception $e) {
			Log::info($e);
			return false;
		}
	}
}