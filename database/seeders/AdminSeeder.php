<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'name' => 'Owner Nbras',
            'username' => 'nbras',
            'phone' => '0599584992',
            'status' => 'active',
            'image' => 'admins/default.png',
            'email' => 'nbras@store.com',
            'password'=>Hash::make('000'),
        ]);

        $role = Role::create(['name' => 'Super Admin', 'guard_name' => 'admin']);
        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);
        $admin->assignRole([$role->id]);
    }
}
