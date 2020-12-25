<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Role::create([
        'title'=>'Admin',
        'description'=>'Admin',
      ]);
      Role::create([
        'title'=>'User',
        'description'=>'User',
      ]);
      Role::create([
        'title'=>'Professional',
        'description'=>'Medical Professional',
      ]);
    }
}
