<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class reviewSeeder extends Seeder
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
                "id" => 14,
                "customer_id" => 6,
                "product_id" => 5,
                "rating" => 4,
                "review" => "Best Shirts",
                "review_status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 15,
                "customer_id" => 6,
                "product_id" => 5,
                "rating" => 3,
                "review" => "jnjlkmlk",
                "review_status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ]
        ];
        DB::table("review")
        ->insert($data);
    }
}
