<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class adminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')
        ->insert([
            "id"=>1,
            "first_name"=>"admin",
            "last_name"=>"admin",
            "email_id"=>"admin@gmail.com",
            "phone"=>123456789,
            "password"=>"admin",
        ]);
    }
}
