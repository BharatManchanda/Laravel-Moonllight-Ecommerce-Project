<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class categoriesSeeder extends Seeder
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
                "id" => 3,
                "category_name" => "Women",
                "category_slug" => "Women",
                "category_image" => "1675221487.jpg",
                "parent_category_id" => 0,
                "is_homepage" => 1,
                "category_status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 4,
                "category_name" => "Men",
                "category_slug" => "Men",
                "category_image" => "1675221547.jpg",
                "parent_category_id" => 0,
                "is_homepage" => 1,
                "category_status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 5,
                "category_name" => "Kids",
                "category_slug" => "Kids",
                "category_image" => "1675221569.jpg",
                "parent_category_id" => 0,
                "is_homepage" => 1,
                "category_status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 6,
                "category_name" => "Shoes",
                "category_slug" => "Shoes",
                "category_image" => "1675221595.jpg",
                "parent_category_id" => 0,
                "is_homepage" => 1,
                "category_status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 7,
                "category_name" => "Bags",
                "category_slug" => "Bags",
                "category_image" => "1675221622.jpg",
                "parent_category_id" => 0,
                "is_homepage" => 1,
                "category_status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 8,
                "category_name" => "T-shirts",
                "category_slug" => "men-tshirt",
                "category_image" => "1675738581.jpg",
                "parent_category_id" => 4,
                "is_homepage" => 1,
                "category_status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 9,
                "category_name" => "Formal Shirt",
                "category_slug" => "formal-shirt",
                "category_image" => "1675739196.jpg",
                "parent_category_id" => 4,
                "is_homepage" => 1,
                "category_status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 10,
                "category_name" => "Casula Shirt",
                "category_slug" => "casula-shirt",
                "category_image" => "1675739224.jpg",
                "parent_category_id" => 4,
                "is_homepage" => 1,
                "category_status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]
        ];
        DB::table("categories")
        ->insert($data);
    }
}
