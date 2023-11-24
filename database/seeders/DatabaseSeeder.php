<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(initialseed::class);
        DB::table('users')->insert([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@library.com',
            'password' => bcrypt('admin123'),
            'is_admin' => true
        ]);
    }
}
