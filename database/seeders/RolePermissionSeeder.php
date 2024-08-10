<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'admin']);

        $permissions = [
            ['name' => 'user list'],
            ['name' => 'create user'],
            ['name' => 'update user'],
            ['name' => 'delete user'],
            ['name' => 'role list'],
            ['name' => 'create role'],
            ['name' => 'update role'],
            ['name' => 'delete role']
        ];

        // foreach($permissions as $item){
        //     Permission::create($item);
        // }
        
        // $user = User::first();
        // $user->assignRole($role);
        
        foreach($permissions as $permission) {
            $perm = Permission::create($permission);
            $role->givePermissionTo($perm);
        }

        // Assign the admin role to the first user
        $user = User::first();
        if ($user) {
            $user->assignRole($role);
        }
    }
}
