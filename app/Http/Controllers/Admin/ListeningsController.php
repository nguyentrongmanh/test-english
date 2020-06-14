<?php

namespace App\Http\Controllers\Admin;

use App\Enums\FileUploadPath;
use App\Enums\ToeicPart;
use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Listening;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ListeningsController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
		$this->middleware(function ($request, $next) {
			$userRole = Auth::user()->role;
			if ($userRole != UserRole::ADMIN) {
				return redirect()->route("home");
			}
			return $next($request);
		});
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index(Request $request) {
		$queryParams = $request->query();
		$part = $queryParams["part"] ?? ToeicPart::PART_ONE;
		$limit = $queryParams["limit"] ?? 10;
		$listeningQuestions = Listening::where("part", $part)
			->paginate($limit);
		return view('admin.listenings.index', [
			"listeningQuestions" => $listeningQuestions,
			"part" => $part,
			"limit" => $limit
		]);
	}

	public function getCreate(Request $request) {
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
			$result = $this->createPartThree($request);
			break;
		case ToeicPart::PART_FOUR:
			$result = $this->createPartFour($request);
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
			
			$questionData = $request->input("questions");
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
			
			$questionData = $request->input("questions");
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

	public function delete($id) {
		try {
			Listening::destroy($id);
		} catch (\Exception $th) {
			Log::info($e);
			return redirect()->route('index-listening')->with('error', __('error'));
		}
        return redirect()->route('index-listening')->with('delete', __('success'));
	}

	public function detail($id)
	{
		$listening = Listening::find($id);
		return view('admin.listenings.detail', [
			"listening" => $listening
		]);
	}
}