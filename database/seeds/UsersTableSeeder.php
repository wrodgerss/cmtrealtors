<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->states('admin')->create();
        factory(User::class, 2)->states('project_manager')->create();
        factory(User::class, 15)->states('team_member')->create();
    }
}
