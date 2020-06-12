<?php

namespace App\Http\Controllers\Admin;

use App\Classes;
use App\Enums\CloseFlag;
use App\Enums\FileUploadPath;
use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassFormRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ClassesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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
    public function index(Request $request)
    {
        $queryParams = $request->query();
        $limit = $queryParams["limit"] ?? 10;
        $search = $queryParams["search"] ?? "";

        $users = User::select('id as user_id', 'name as teacher_name');
        $classes = DB::table('classes')
            ->joinSub($users, 'users', function ($join) {
                $join->on('classes.teacher_id', '=', 'users.user_id');
            })
            ->where("teacher_name", "like", "%$search%")
            ->paginate($limit);

        return view('admin.classes.index', [
            "classes" => $classes,
            "limit" => $limit,
        ]);
    }

    public function getAdd()
    {
        $class = new Classes;
        $teachers = User::where('role', UserRole::ADMIN)->get();

        return view('admin.classes.add', [
            'teachers' => $teachers,
            'classes' => $class,
        ]);
    }

    public function add(ClassFormRequest $request)
    {
        $data = $request->all();
        $data['teacher_id'] = (int) $data['teacher_id'];
        $data['target'] = (int) $data['target'];
        $data['total_number'] = (int) $data['total_number'];
        $data['fee'] = (int) $data['fee'];
        $data['register_number'] = (int) $data['register_number'];
        $data['close_flg'] = CloseFlag::EMPTY;
        $data['start_date'] = Carbon::createFromFormat('Y-m-d', $data['start_date']);
        $data['end_date'] = Carbon::createFromFormat('Y-m-d', $data['end_date']);
        // save image file to server
        if (isset($data['image'])) {
            $image = $data['image'];
            $imageName = "image_" . md5(time()) . "." . $image->getClientOriginalExtension();
            $image->move(FileUploadPath::IMAGE, $imageName);
            $data['image'] = $imageName;
        }
        unset($data['_token']);

        try {
            $class = Classes::create($data);
        } catch (\Exception $e) {
            Log::info($e);
            return redirect()->route('index-classes')->with('error', __('error'));
        }
        return redirect()->route('index-classes')->with('success', __('success'));
    }

    public function getEdit($id)
    {
        $classDetail = Classes::find($id);
        $teachers = User::where('role', UserRole::ADMIN)->get();

        return view('admin.classes.edit', [
            'teachers' => $teachers,
            'class' => $classDetail,
        ]);
    }

    public function edit(ClassFormRequest $request, $id)
    {
        $data = $request->all();
        $data['teacher_id'] = (int) $data['teacher_id'];
        $data['target'] = (int) $data['target'];
        $data['total_number'] = (int) $data['total_number'];
        $data['fee'] = (int) $data['fee'];
        $data['close_flg'] = CloseFlag::EMPTY;
        $data['start_date'] = Carbon::createFromFormat('Y-m-d', $data['start_date']);
        $data['end_date'] = Carbon::createFromFormat('Y-m-d', $data['end_date']);
		unset($data['_token']);
		
		$class = Classes::find($id);
		if ($request->file('image') != null) {
            $image = $request->file('image');
            $imageName = "image_" . md5(time()) . "." . $image->getClientOriginalExtension();
            $image->move(FileUploadPath::IMAGE, $imageName);
			if ($class->image != null) {
				File::delete(public_path('image/' . $class->image));
			}
            $class->image = $imageName;
        }

        try {
            $class->name = $data['name'];
            $class->teacher_id = $data['teacher_id'];
            $class->target = $data['target'];
            $class->address = $data['address'];
            $class->schedule = $data['schedule'];
            $class->description = $data['description'];
            $class->total_number = $data['total_number'];
            $class->fee = $data['fee'];
            $class->start_date = $data["start_date"];
            $class->end_date = $data["end_date"];
            $class->close_flg = $data["close_flg"];
            $class->save();
        } catch (\Exception $e) {
            Log::info($e);
            return redirect()->route('index-classes')->with('error', __('error'));
        }
        return redirect()->route('index-classes')->with('edit', __('success'));
    }

    public function detail($id)
    {
        $classDetail = Classes::find($id);
        $teacher = $classDetail->getTeacher($classDetail->teacher_id);
        $students = $classDetail->users;

        return view('admin.classes.detail', [
            "class" => $classDetail,
            "teacher" => $teacher,
            "students" => $students,
        ]);
    }

    public function delete($id)
    {
        try {
            Classes::destroy($id);
        } catch (\Exception $th) {
            Log::info($e);
            return redirect()->route('index-classes')->with('error', __('error'));
        }
        return redirect()->route('index-classes')->with('delete', __('success'));
    }
}