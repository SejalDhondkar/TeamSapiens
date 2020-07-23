<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Role;
use Illuminate\Database\Eloquent\Model;
class DatabaseSeeder extends Seeder
{
    public function run()
    {
      Model::unguard();
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      $this->call(RoleSeed::class);
      $this->call(UserSeed::class);
      DB::statement('SET FOREIGN_KEY_CHECKS=1;');
      Model::reguard();
    }
}
