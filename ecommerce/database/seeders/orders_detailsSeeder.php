<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class orders_detailsSeeder extends Seeder
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
            "id" => 210,
            "orders_id" => 1,
            "product_id" => 7,
            "product_attrs_id" => 42,
            "price" => 509,
            "quantity" => 1,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s")
            ],
            [
            "id" => 211,
            "orders_id" => 2,
            "product_id" => 5,
            "product_attrs_id" => 40,
            "price" => 488,
            "quantity" => 8,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s")
            ]
        ];
        DB::table("orders_details")
        ->insert($data);
    }
}