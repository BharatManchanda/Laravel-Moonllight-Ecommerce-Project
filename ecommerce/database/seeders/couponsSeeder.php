<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class couponsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data=[
            [
                "id" => 1,
                "coupon_title" => "SHIV-RATRI",
                "coupon_code" => "SHIV-RATRI",
                "coupon_value" => 15,
                "type" => "Value",
                "min_order_amt" => 300,
                "is_one_time" => 0,
                "coupon_status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 2,
                "coupon_title" => "HOLI-PHAG",
                "coupon_code" => "HOLI-PHAG",
                "coupon_value" => 30,
                "type" => "Percentage",
                "min_order_amt" => 200,
                "is_one_time" => 0,
                "coupon_status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ]
        ];
        DB::table("coupons")
        ->insert($data);
    }
}
