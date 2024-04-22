<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
        ];

        foreach($permissions as $permission){
            Permission::create(['name'=>$permission]);
        }

        // Create an administration role, get all the permissions
        // from the available ones, and add them to the new role
        $role = Role::create(['name'=>'admin']);
        $rolePermissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($rolePermissions);

        $adminUser = User::create([
            'name'=>'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('Password1'),
        ]);

        $adminUser->assignRole([$role->id]);
    }
}
