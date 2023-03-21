<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class taxesSeeder extends Seeder
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
                "tax_desc" => "GST 0",
                "tax_value" => 0,
                "tax_status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 2,
                "tax_desc" => "GST 5",
                "tax_value" => 5,
                "tax_status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 3,
                "tax_desc" => "GST 12",
                "tax_value" => 12,
                "tax_status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 4,
                "tax_desc" => "GST 18",
                "tax_value" => 18,
                "tax_status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 5,
                "tax_desc" => "GST 28",
                "tax_value" => 28,
                "tax_status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ]
        ];
        DB::table("taxes")
        ->insert($data);
    }
}
