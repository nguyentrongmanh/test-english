<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Listening;

class ListeningsController extends Controller
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
        return view('admin.listenings.index', [
            "listeningQuestions" => $listeningQuestions
        ]);
    }

    public function getCreate(Request $requet)
    {
        return view('admin.listenings.add');
    }
}
