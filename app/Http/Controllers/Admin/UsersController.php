<?php

namespace App\Http\Controllers\Admin;

use App\Enums\FileUploadPath;
use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserValidator;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class UsersController extends Controller
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
		$users = User::where("email", "like", "%$search%")
			->paginate($limit);
        return view('admin.users.index', [
			"users" => $users,
			"limit" => $limit
		]);
	}
	
	public function create(UserValidator $request)
    {
		if (!$request->validated()) {
            return redirect()->back();
        }
		$data = $request->all();
		$data['email_verified_at'] = Carbon::now()->format("Y-m-d H:i:s");
		$data['password'] = Hash::make($data['password']);
		if (isset($data['image'])) {
            $image = $data['image'];
            $imageName = "image_" . md5(time()) . "." . $image->getClientOriginalExtension();
            $image->move(FileUploadPath::IMAGE, $imageName);
            $data['image'] = $imageName;
        }
		try {
			$user = User::create($data);
		} catch (\Exception $e) {
			Log::info($e);
			return redirect()->route('admin-home')->with('error', __('error'));
		}
		return redirect()->route('admin-home')->with('success', __('success'));
	}
	
	public function getCreate()
    {
        return view('admin.users.add');
	}
	
	public function getEdit($id)
    {
		$user = User::find($id);
		return view('admin.users.edit', [
			"user" => $user
		]);
	}
	
	public function edit(UserValidator $request, $id)
    {
		if (!$request->validated()) {
            return redirect()->back();
        }
		$data = $request->input();
		unset($data['_token']);
		try {
			$user = User::find($id);
			if ($request->file('image') != null) {
				$image = $request->file('image');
				$imageName = "image_" . md5(time()) . "." . $image->getClientOriginalExtension();
				$image->move(FileUploadPath::IMAGE, $imageName);
				if ($user->image != null) {
					File::delete(public_path('image/' . $user->image));
				}
				$user->image = $imageName;
			}
			$user->name = $data['name'];
			$user->age = $data["age"];
			$user->address = $data["address"];
			$user->phone = $data["phone"];
			$user->company = $data["company"];
			$user->role = $data["role"];
			$user->save();
		} catch (\Exception $e) {
			Log::info($e);
			return redirect()->route('admin-home')->with('error', __('error'));
		}
		return redirect()->route('admin-home')->with('edit', __('success'));
	}
	
	public function delete($id)
    {
		try {
			User::destroy($id);
		} catch (\Exception $th) {
			Log::info($e);
			return redirect()->route('admin-home')->with('error', __('error'));
		}
        return redirect()->route('admin-home')->with('delete', __('success'));
	}
	
	public function detail($id)
	{
		$user = User::find($id);
		return view('admin.users.detail', [
			"user" => $user
		]);
	}
}