<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\User;
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
        Location::truncate();
        $role_admin = Role::create(['name' => 'super-admin']);
        $role_user = Role::create(['name' => 'user']);
        Permission::create(['name' => 'dashboard'])->syncRoles([$role_user, $role_admin]);

        $user_admin = User::factory()
            ->has(Location::factory()->count(5))
            ->create([
                'email' => 'user@user.com',
                'email_verified_at' => null,
                'remember_token' => null,
            ]);
        $user_admin->assignRole($role_admin);

        $user = User::factory()
            ->has(Location::factory()->count(5))
            ->create([
                'email' => 'user2@user.com',
                'email_verified_at' => null,
                'remember_token' => null,
            ]);
        $user->assignRole($role_user);

        $users = User::factory(100)
            ->has(Location::factory()->count(5))
            ->create();

        foreach ($users as $user) {
            $user->assignRole($role_user);
        }
    }
}
