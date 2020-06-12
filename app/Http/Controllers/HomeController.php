<?php

namespace App\Http\Controllers;

use App\Classes;
use App\User;
use App\ClassRegister;
use App\Enums\CloseFlag;
use App\Enums\UserRole;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		$currentUser = $this->get_login_user();
		// dd($currentUser);
    	View::share('currentUser', $currentUser);
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$classes = Classes::where('close_flg', CloseFlag::EMPTY)
			->limit(2)
			->get();
		$teachers = User::where("role", UserRole::ADMIN)
			->limit(3)
			->get();
        return view('home', [
			"classes" => $classes,
			"teachers" => $teachers
		]);
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