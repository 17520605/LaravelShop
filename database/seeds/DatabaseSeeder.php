<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        \DB::table('admins')->insert([
            'name' => ' Nguyen Huu Minh Khai',
            'email'=>'nguyenhuuminhkhai@gmail.com',
            'password'=>bcrypt('123123')

        ]);
    }
}
