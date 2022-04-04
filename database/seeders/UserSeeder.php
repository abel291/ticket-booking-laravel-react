<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Role::truncate();
        Permission::truncate();

        $role_user = Role::create(['name' => 'user']);
        $role_admin = Role::create(['name' => 'admin']);
        Permission::create(['name' => 'dashboard'])->syncRoles([$role_admin]);

        $user_admin = User::factory()->create([
            'email' => 'user@user.com',
            'email_verified_at' => null,
            'remember_token' => null,
        ]);
        $user_admin->assignRole($role_admin);

        $user = User::factory()->create([
            'email' => 'user2@user.com',
            'email_verified_at' => null,
            'remember_token' => null,
        ]);
        $user->assignRole($role_user);

        $users = User::factory(20)->create();
        foreach ($users as $user) {
            $user->assignRole($role_user);
        }
    }
}
