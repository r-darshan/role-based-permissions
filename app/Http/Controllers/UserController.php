<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Users\UserUpdateRequest;
use App\Http\Requests\Users\UserCreateRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereNotIn('id', [auth()->id()])->paginate(config('constants.paginate.itemcount'));

        return view('users.view-all', compact('users'));
    }

    public function show($id)
    {
        $user = User::with('permissions')->where('id', $id)->first();
        $permissions = Permission::all();

        return view('users.single-view', compact('user', 'permissions'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserCreateRequest $request)
    {
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
        ]);

        $user->assignRole('sub-admin');

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::with('permissions')->where('id', $id)->first();
        $permissions = Permission::all();

        return view('users.edit', compact('user', 'permissions'));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::where('id', $id)->first();

        $user->name = $request->name;
        $user->email = $request->email;

        if (!$user->update()) {
            abort(500);
        }

        return redirect()->route('users.index');
    }
}
