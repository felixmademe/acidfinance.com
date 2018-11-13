<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email'    => 'admin@simplefinance.com',
            'name'     => 'Admin',
            'password' => bcrypt('secret'),
        ]);
        $users = factory(User::class, 10)->create();
    }
}
