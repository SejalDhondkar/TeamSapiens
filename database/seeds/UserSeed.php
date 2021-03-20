<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
          'name' => 'Admin',
          'email' => 'admin@test.com',
          'password' => Hash::make('admin'),
          'role_id'=> 1,
      ]);

      User::create([
          'name' => 'Hospital 1',
          'email' => 'hospital1@test.com',
          'password' => Hash::make('password'),
          'role_id' => 2
        ]);
        User::create([
            'name' => 'Hospital 2',
            'email' => 'hospital2@test.com',
            'password' => Hash::make('password'),
            'role_id' => 2
        ]);
        User::create([
            'name' => 'Hospital 3',
            'email' => 'hospital3@test.com',
            'password' => Hash::make('password'),
            'role_id' => 2
        ]);
    }
}
