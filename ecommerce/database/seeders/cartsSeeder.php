<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class cartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            "id"=>89,
            "user_id"=>6,
            "user_type"=>"Register",
            "quanity"=>2,
            "product_id"=>5,
            "product_attr_id"=>40,
            "created_at"=>date("Y-m-d H:i:s"),
            "updated_at"=>date("Y-m-d H:i:s")
        ];
        DB::table("carts")
        ->insert($data);
    }
}
