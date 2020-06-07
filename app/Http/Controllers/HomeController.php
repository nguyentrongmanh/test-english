<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Enums\CloseFlag;
use Illuminate\Http\Request;

class HomeController extends Controller
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
    public function index()
    {
        return view('home');
    }

    function class (Request $request)
    {
        //get 7 random-classes
        $classes = Classes::where('close_flg', CloseFlag::EMPTY)
			->limit(7)->get();
        return view('class', [
            "classes" => $classes,
        ]);
    }
}