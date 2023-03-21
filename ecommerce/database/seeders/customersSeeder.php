<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Crypt;

class customersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            "id" => 6,
            "name" => "Bharat Manchanda",
            "email_id" => "bharatmanchanda13@gmail.com",
            "mobile" => 7777004907,
            "password" => Crypt::encrypt("admin123"),
            "address" => "Urlana Kalan - Panipat 132103",
            "locality" => "Urlana Kalan",
            "city" => "Panipat",
            "state" => "Haryana",
            "zip" => "132103",
            "company" => "Moonroof",
            "gstin" => "",
            "customer_status" => 1,
            "is_verify" => 1,
            "is_forget_password" => 0,
            "is_rand" => 0,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s")
        ];
        DB::table("customers")
        ->insert($data);
    }
}
