<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // passwords are encrypted from model
        $user = User::create([
            "name" => "admin1",
            "email" => "admin1@gmail.com",
            "password" => "admin1@gmail.com",
        ]);
        $user->assignRole('admin');
        $permissions = Permission::all()->pluck('name');
        $user->givePermissionTo($permissions);

        $user = User::create([
            "name" => "sub-admin1",
            "email" => "subadmin1@gmail.com",
            "password" => "subadmin1@gmail.com",
        ]);
        $user->assignRole('sub-admin');
        $user->givePermissionTo([
            "products.create",
            "products.update",
            "products.read",
            "transaction_histories.read"
        ]);

        $user = User::create([
            "name" => "sub-admin2",
            "email" => "subadmin2@gmail.com",
            "password" => "subadmin2@gmail.com",
        ]);
        $user->assignRole('sub-admin');

        $user = User::create([
            "name" => "sub-admin3",
            "email" => "subadmin3@gmail.com",
            "password" => "subadmin3@gmail.com",
        ]);
        $user->assignRole('sub-admin');
    }
}
