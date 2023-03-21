<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class product_attrsSeeder extends Seeder
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
                "id" => 30,
                "product_id" => 32,
                "sku" => "kmnknkmh",
                "mrp" => 67,
                "price" => 67,
                "size" => 7,
                "quantity" => 12,
                "color_id" => 1,
                "attr_img" => "955111527.jpg",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 34,
                "product_id" => 2,
                "sku" => "hjyggyhtfr",
                "mrp" => 56,
                "price" => 6,
                "size" => 7,
                "quantity" => 13,
                "color_id" => 2,
                "attr_img" => "15990996.jpg",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 35,
                "product_id" => 2,
                "sku" => "ghhfty",
                "mrp" => 78,
                "price" => 13,
                "size" => 7,
                "quantity" => 11,
                "color_id" => 2,
                "attr_img" => "707955496.jpg",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 40,
                "product_id" => 5,
                "sku" => "Chasma",
                "mrp" => 900,
                "price" => 488,
                "size" => 8,
                "quantity" => 10,
                "color_id" => 3,
                "attr_img" => "732122553.jpg",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 41,
                "product_id" => 6,
                "sku" => "tshirt_001",
                "mrp" => 900,
                "price" => 675,
                "size" => 11,
                "quantity" => 20,
                "color_id" => 3,
                "attr_img" => "446599517.jpg",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 42,
                "product_id" => 7,
                "sku" => "teddy",
                "mrp" => 800,
                "price" => 509,
                "size" => 7,
                "quantity" => 20,
                "color_id" => 2,
                "attr_img" => "14624063.jpg",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 43,
                "product_id" => 8,
                "sku" => "thsirt_1",
                "mrp" => 900,
                "price" => 565,
                "size" => 11,
                "quantity" => 13,
                "color_id" => 3,
                "attr_img" => "452371065.jpg",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 44,
                "product_id" => 6,
                "sku" => "tshirt_002",
                "mrp" => 860,
                "price" => 439,
                "size" => 7,
                "quantity" => 20,
                "color_id" => 27,
                "attr_img" => "746923934.jpg",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 45,
                "product_id" => 6,
                "sku" => "tshirt_003",
                "mrp" => 900,
                "price" => 679,
                "size" => 7,
                "quantity" => 20,
                "color_id" =>   1,
                "attr_img" => "338287469.jpg",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 48,
                "product_id" => 26,
                "sku" => "t-shirts2",
                "mrp" => 2,
                "price" => 1,
                "size" => 7,
                "quantity" => 90,
                "color_id" =>   1,
                "attr_img" => "367480560.jpg",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 49,
                "product_id" => 26,
                "sku" => "vhvhvhgg",
                "mrp" => 16,
                "price" => 3,
                "size" => 7,
                "quantity" => 20,
                "color_id" =>   12,
                "attr_img" => "901120262.jpg",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 50,
                "product_id" => 27,
                "sku" => "TshirtTshirt",
                "mrp" => 569,
                "price" => 349,
                "size" => 8,
                "quantity" => 40,
                "color_id" =>   14,
                "attr_img" => "537924569.jpg",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
        ];
        DB::table("product_attrs")
        ->insert($data);
    }
}
