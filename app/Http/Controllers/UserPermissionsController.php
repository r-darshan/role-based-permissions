<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Users\UserPermissionUpdate;
use App\Models\User;

class UserPermissionsController extends Controller
{
    public function __invoke(UserPermissionUpdate $request, $id)
    {
        $user = User::where('id', $id)->first();
        $permissions = array_keys($request->permissions);
        $user->syncPermissions($permissions);

        return redirect()->route('users.index');
    }
}
