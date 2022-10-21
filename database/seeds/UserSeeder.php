<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    factory(User::class, 200)->create();
  }
}
