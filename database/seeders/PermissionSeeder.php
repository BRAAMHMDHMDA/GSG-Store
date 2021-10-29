<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'home-show',
            'admin-list',
            'admin-create',
            'admin-edit',
            'admin-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'brand-list',
            'brand-create',
            'brand-edit',
            'brand-delete',
            'tag-list',
            'tag-create',
            'tag-edit',
            'tag-delete',
            'currency-list',
            'currency-create',
            'currency-edit',
            'currency-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'order-list',
            'order-show',
            'order-edit-status',
            'order-delete',
        ];
        foreach ($permissions as $permission) {
            \Spatie\Permission\Models\Permission::create(['name' => $permission, 'guard_name' => 'admin']);
        }
    }
}
