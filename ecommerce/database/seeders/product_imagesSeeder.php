<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class product_imagesSeeder extends Seeder
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
                "id" => 17,
                "product_id" => 32,
                "product_images" => "119222765.jpg",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 19,
                "product_id" => 32,
                "product_images" => "865706903505714586.jpg",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 34,
                "product_id" => 5,
                "product_images" => "807393771797169621.jpg",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 35,
                "product_id" => 5,
                "product_images" => "232450146637389283.jpg",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 36,
                "product_id" => 6,
                "product_images" => "530544490125822199.jpg",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 37,
                "product_id" => 7,
                "product_images" => "22633101267720041.jpg",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 38,
                "product_id" => 7,
                "product_images" => "706754929139254198.jpg",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 39,
                "product_id" => 8,
                "product_images" => "53427680194344317.jpg",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 40,
                "product_id" => 8,
                "product_images" => "367071907899404872.jpg",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 41,
                "product_id" => 26,
                "product_images" => "708356980191440549.jpg",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 42,
                "product_id" => 27,
                "product_images" => "948788442148537950.jpg",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
        ];
        DB::table("product_images")
        ->insert($data);
    }
}
