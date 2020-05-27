<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reading;
use App\Question;
use App\Enum\ToeicPart;

class ReadingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $requet)
    {
        $queryParams = $request->query();
        $part = $queryParams["part"];
        $listeningQuestions = Listening::where("part", $part)
            ->join("questions", "")
            ->get();
        return view('admin.readings.index', [
            "listeningQuestions" => $listeningQuestions
        ]);
    }

    public function getCreate(Request $request)
    {
        return view('admin.readings.add');
    }

    public function create(Request $request)
    {
        $data = $request->all();
        dd($data);
        switch ($data['part']) {
            case ToeicPart::PART_FIVE :

                break;
            
            default:
                # code...
                break;
        }
        dd($data);
        return view('admin.readings.add');
    }
}
