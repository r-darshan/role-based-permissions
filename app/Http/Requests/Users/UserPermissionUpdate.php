<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\Permission\Models\Permission;

class UserPermissionUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // dd(request()->all());
        return [
            "permissions" => [
                "required",
                "array",
                function($attribute, $value, $fail) {
                    $permissionsFromRequest = collect(array_keys($value));
                    $permissionsExists = Permission::whereIn("name", $permissionsFromRequest)->get();
                    $invalidPermissions = [];

                    $permissionsFromRequest->map(function($permissionFromRequest) use($permissionsExists, &$invalidPermissions) {
                        $found = $permissionsExists->where('name', $permissionFromRequest);
                        if (! $found) {
                            $invalidPermissions[] = $permissionFromRequest;
                        }
                    });

                    if (count($invalidPermissions) > 0) {
                        $fail(implode(", ", $invalidPermissions) . " are invalid permissions found in request.");
                    }
                    // $permissionsExists->map(function($permission) use($permissionsFromRequest, &$invalidPermissions) {
                    //     if (! in_array($permission->name, $permissionsFromRequest)) {
                    //         $invalidPermissions[] = 
                    //     }
                    // })
                }
            ]
        ];
    }
}
