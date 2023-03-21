<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ordersSeeder extends Seeder
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
            [
                "id" => 1,
                "customer_id" => 6,
                "name" => "Bharat Manchanda",
                "email" => "bharatmanchanda13@gmail.com",
                "mobile" => "7777004907",
                "address" => "Urlana Kalan - Panipat 132103",
                "locality" => "Urlana Kalan",
                "city" => "132103",
                "state" => "Haryana",
                "zip" => "132103",
                "coupon_code" => "SHIV-RATRI",
                "coupon_value" => 15,
                "orders_status" => 1,
                "payment_type" => "Gateway",
                "payment_status" => "Pending",
                "payment_id" => 0,
                "transaction_id" => "401ffe3fa768459c9154ef226c6ab44c",
                "total_amount" => 494,
                "tracking" => "Reached Noida",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 2,
                "customer_id" => 6,
                "name" => "Bharat Manchanda",
                "email" => "bharatmanchanda13@gmail.com",
                "mobile" => "7777004907",
                "address" => "Urlana Kalan - Panipat 132103",
                "locality" => "Urlana Kalan",
                "city" => "132103",
                "state" => "Haryana",
                "zip" => "132103",
                "coupon_code" => "",
                "coupon_value" => 0,
                "orders_status" => 1,
                "payment_type" => "Gateway",
                "payment_status" => "Pending",
                "payment_id" => 0,
                "transaction_id" => "620fa94025c3458abbbe8efea5da9b86",
                "total_amount" => 3904,
                "tracking" => "Your Order is Confirmed",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
        ];
        DB::table("orders")
        ->insert($data);
    }
}
