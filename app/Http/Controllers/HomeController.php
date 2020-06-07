<?php

namespace App\Http\Controllers;

use App\Classes;
use App\ClassRegister;
use App\Enums\CloseFlag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    function class ()
    {
        $classes = Classes::where('close_flg', CloseFlag::EMPTY)
            ->get();
        return view('class', [
            "classes" => $classes,
        ]);
    }

    public function register(Request $request)
    {
        $params = $request->all();
        if (!isset($params['id'])) {
            return;
        }
        $classId = (int) $params['id'];
        $userId = Auth::id();
        $classRegister = new ClassRegister();
        $classRegister->user_id = $userId;
        $classRegister->class_id = $classId;
        $teachingClassId = ClassRegister::where('user_id', $userId)
            ->pluck('class_id')->toArray();
        if (in_array($classId, $teachingClassId)) {
            return redirect()->route('home')->with('error', __('error'));
        }
        if ($classRegister->save()) {
            $classDetail = Classes::find($classId);
			$classDetail->register_number += 1;
            if ($classDetail->register_number >= $classDetail->total_number) {
				$classDetail->close_flg = CloseFlag::FULL;
            }
			$classDetail->save();
            return redirect()->route('home')->with('success', __('success'));
		}
		return redirect()->route('home')->with('error', __('error'));
    }
}