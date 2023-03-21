<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class homebannersSeeder extends Seeder
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
                "banner_image" => "1675338153.jpg",
                "button_txt" => "Shop Now",
                "button_link" => "https://www.google.com/",
                "banner_percentage" => "Save Up to 75% off",
                "banner_title" => "Men Collection",
                "banner_desc" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.",
                "banner_status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 2,
                "banner_image" => "1675338607.jpg",
                "button_txt" => "Shop Now",
                "button_link" => "https://www.google.com/",
                "banner_percentage" => "SAVE UP TO 40% OFF",
                "banner_title" => "WRISTWATCH COLLECTION",
                "banner_desc" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.",
                "banner_status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 3,
                "banner_image" => "1675338675.jpg",
                "button_txt" => "Shop Now",
                "button_link" => "https://www.google.com/",
                "banner_percentage" => "SAVE UP TO 75% OFF",
                "banner_title" => "JEANS COLLECTION",
                "banner_desc" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.",
                "banner_status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 4,
                "banner_image" => "1675338744.jpg",
                "button_txt" => "Shop Now",
                "button_link" => "https://www.google.com/",
                "banner_percentage" => "SAVE UP TO 75% OFF",
                "banner_title" => "EXCLUSIVE SHOES",
                "banner_desc" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.",
                "banner_status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 5,
                "banner_image" => "1675338818.jpg",
                "button_txt" => "Shop Now",
                "button_link" => "https://www.google.com/",
                "banner_percentage" => "SAVE UP TO 50% OFF",
                "banner_title" => "BEST COLLECTION",
                "banner_desc" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.",
                "banner_status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
        ];
        DB::table("homebanners")
        ->insert($data);
    }
}
