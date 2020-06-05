<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassRequest;
use App\User;
use App\Classs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

    public function create(ClassRequest $request)
    {
        if (!$request->validated()) {
            return redirect()->back();
        }
        $data = $request->all();
        try {
            $user = Classs::create($data);
        } catch (\Exception $e) {
            Log::info($e);
            return redirect()->route('admin-home')->with('error', __('error'));
        }
        return redirect()->route('admin-home')->with('success', __('success'));
    }

    public function getCreate()
    {
        return view('admin.classes.add');
    }

    public function edit(ClassRequest $request, $id)
    {
        if (!$request->validated()) {
            return redirect()->back();
        }
        $data = $request->input();
        unset($data['_token']);
        try {
            $user = User::find($id);
            $user->name = $data['name'];
            $user->age = $data["age"];
            $user->address = $data["address"];
            $user->phone = $data["phone"];
            $user->company = $data["company"];
            $user->role = $data["role"];
            $user->save();
        } catch (\Exception $e) {
            Log::info($e);
            return redirect()->route('index-classes')->with('error', __('error'));
        }
        return redirect()->route('index-classes')->with('edit', __('success'));
    }

    public function getEdit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', [
            "user" => $user
        ]);
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
            Classs::destroy($id);
        } catch (\Exception $th) {
            Log::info($e);
            return redirect()->route('index-classes')->with('error', __('error'));
        }
        return redirect()->route('index-classes')->with('delete', __('success'));
    }
}
