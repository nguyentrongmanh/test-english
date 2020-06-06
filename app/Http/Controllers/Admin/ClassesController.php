<?php

namespace App\Http\Controllers\Admin;

use App\Classes;
use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassFormRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        $data['close_flg'] = 1;
        $data['start_date'] = Carbon::createFromFormat('Y-m-d', $data['start_date']);
        $data['end_date'] = Carbon::createFromFormat('Y-m-d', $data['end_date']);
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
        $teacherId = $classDetail->teacher_id;
        $teachers = User::where('role', UserRole::ADMIN)->get();

        return view('admin.classes.edit', [
            'teacherId' => $teacherId,
            'teachers' => $teachers,
            'class' => $classDetail,
        ]);
    }

    public function edit(ClassFormRequest $request, $id)
    {
        $data = $request->all();
        dd($data);
        $data['teacher_id'] = (int) $data['teacher_id'];
        $data['target'] = (int) $data['target'];
        $data['total_number'] = (int) $data['total_number'];
        $data['fee'] = (int) $data['fee'];
        $data['register_number'] = (int) $data['register_number'];
        $data['close_flg'] = 1;
        $data['start_date'] = Carbon::createFromFormat('Y-m-d', $data['start_date']);
        $data['end_date'] = Carbon::createFromFormat('Y-m-d', $data['end_date']);
        unset($data['_token']);

        try {
            $class = Classes::find($id);
            $class->name = $data['name'];
            $class->teacher_id = $data['teacher_id'];
            $class->target = $data['target'];
            $class->address = $data['address'];
            $class->schedule = $data['schedule'];
            $class->description = $data['description'];
            $class->total_number = $data['total_number'];
            $class->fee = $data['fee'];
            $class->register_number = $data['register_number'];
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
        $users = User::select('id as user_id', 'name as teacher_name');
        $classDetail = DB::table('classes')
            ->joinSub($users, 'users', function ($join) {
                $join->on('classes.teacher_id', '=', 'users.user_id');
            })
            ->where('id', $id)
            ->first();
        return view('admin.classes.detail', [
            "class" => $classDetail,
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
