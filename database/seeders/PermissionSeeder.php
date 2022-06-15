<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name'=>'users.create']);
        Permission::create(['name'=>'users.update']);
        Permission::create(['name'=>'users.read']);
        Permission::create(['name'=>'users.delete']);

        Permission::create(['name'=>'categories.create']);
        Permission::create(['name'=>'categories.update']);
        Permission::create(['name'=>'categories.read']);
        Permission::create(['name'=>'categories.delete']);

        Permission::create(['name'=>'products.create']);
        Permission::create(['name'=>'products.update']);
        Permission::create(['name'=>'products.read']);
        Permission::create(['name'=>'products.delete']);

        Permission::create(['name'=>'transaction_histories.read']);
    }
}
