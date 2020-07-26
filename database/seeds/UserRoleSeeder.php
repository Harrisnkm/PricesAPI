<?php

use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['id' => 1, 'role' => 'admin'],
            ['id' => 2, 'role' => 'practice'],
            ['id' => 3, 'role' => 'hospital'],
            ['id' => 4, 'role' => 'patient'],
            ['id' => 5, 'role' => 'vendor']
        ];

        foreach ($roles as $role) {
            App\UserRole::updateOrCreate(['id' => $role['id']], $role);
        }

    }
}
