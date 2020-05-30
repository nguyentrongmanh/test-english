<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ToeicPart;
use App\Enums\FileUploadPath;
use App\Http\Controllers\Controller;
use App\Listening;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ListeningsController extends Controller {
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
	public function index(Request $requet) {
		$queryParams = $request->query();
		$part = $queryParams["part"];
		$listeningQuestions = Listening::where("part", $part)
			->join("questions", "")
			->get();
		return view('admin.listenings.index', [
			"listeningQuestions" => $listeningQuestions,
		]);
	}

	public function getCreate(Request $requet) {
		return view('admin.listenings.add');
	}

	public function create(Request $request) {
		$data = $request->all();
		$result = true;
		switch ($data['part']) {
		case ToeicPart::PART_ONE:
			$result = $this->createPartOne($request);
			break;
		case ToeicPart::PART_TWO:
			$result = $this->createPartTwo($request);
			break;
		case ToeicPart::PART_THREE:
			$result = $this->createPartThree($data);
			break;
		case ToeicPart::PART_FOUR:
			$result = $this->createPartFour($data);
			break;

		default:
			# code...
			break;
		}
		if ($result) {
			return redirect()->route('index-listening')->with('success', __('success'));
		}
		return redirect()->route('create-listening')->with('error', __('error'));
	}

	protected function createPartOne($request) {
		try {
			// save mp3 file to server
			$audio = $request->file('audio');
			$audioName = "audio_" . md5(time()) . "." . $audio->getClientOriginalExtension();
			$audio->move(FileUploadPath::AUDIO, $audioName);
			  
			// save image file to server
			$image = $request->file('main_img');
			$imageName = "image_" . md5(time()) . "." . $image->getClientOriginalExtension();
			$image->move(FileUploadPath::IMAGE, $imageName);

			// insert data to database
			$newPartOne = Listening::create([
				'part' => ToeicPart::PART_ONE,
				"main_img" => $imageName,
				"audio" => $audioName
			]);
			$newQuestion = Question::create([
				'listening_id' => $newPartOne->id,
				"answer" => $request->input("answer"),
				"explain" => $request->input("explain"),
			]);
			
			return true;
		} catch (\Exception $e) {
			Log::info($e);
			return false;
		}
	}

	protected function createPartTwo($request) {
		try {
			// save mp3 file to server
			$audio = $request->file('audio');
			$audioName = "audio_" . md5(time()) . "." . $audio->getClientOriginalExtension();
			$audio->move(FileUploadPath::AUDIO, $audioName);

			// insert data to database
			$newPartTwo = Listening::create([
				'part' => ToeicPart::PART_TWO,
				"audio" => $audioName
			]);
			$newQuestion = Question::create([
				'listening_id' => $newPartTwo->id,
				"answer" => $request->input("answer"),
				"explain" => $request->input("explain"),
			]);
			
			return true;
		} catch (\Exception $e) {
			Log::info($e);
			return false;
		}
	}

	protected function createPartThree($request) {
		try {
			// save mp3 file to server
			$audio = $request->file('audio');
			$audioName = "audio_" . md5(time()) . "." . $audio->getClientOriginalExtension();
			$audio->move(FileUploadPath::AUDIO, $audioName);

			$imageName = null;

			if ($request->file('main_img')) {
				$image = $request->file('main_img');
				$imageName = "image_" . md5(time()) . "." . $image->getClientOriginalExtension();
				$image->move(FileUploadPath::IMAGE, $imageName);
			}

			// insert data to database
			$newPartThree = Listening::create([
				'part' => ToeicPart::PART_THREE,
				"main_img" => $imageName,
				"audio" => $audioName
			]);

			foreach ($questionData as $key => $value) {
				$questionData[$key]["listening_id"] = $newPartThree->id;
			}
			$newQuestions = Question::insert($questionData);
			return true;
		} catch (\Exception $e) {
			Log::info($e);
			return false;
		}
	}

	protected function createPartFour($request) {
		try {
			// save mp3 file to server
			$audio = $request->file('audio');
			$audioName = "audio_" . md5(time()) . "." . $audio->getClientOriginalExtension();
			$audio->move(FileUploadPath::AUDIO, $audioName);

			$imageName = null;

			if ($request->file('main_img')) {
				$image = $request->file('main_img');
				$imageName = "image_" . md5(time()) . "." . $image->getClientOriginalExtension();
				$image->move(FileUploadPath::IMAGE, $imageName);
			}

			// insert data to database
			$newPartFour = Listening::create([
				'part' => ToeicPart::PART_FOUR,
				"main_img" => $imageName,
				"audio" => $audioName
			]);

			foreach ($questionData as $key => $value) {
				$questionData[$key]["listening_id"] = $newPartFour->id;
			}
			$newQuestions = Question::insert($questionData);
			return true;
		} catch (\Exception $e) {
			Log::info($e);
			return false;
		}
	}
}