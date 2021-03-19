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
          'name' => 'User',
          'email' => 'user@test.com',
          'password' => Hash::make('user'),
          'role_id' => 2
      ]);
    }
}
