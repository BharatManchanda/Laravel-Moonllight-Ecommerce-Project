<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class brandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "id"=>1,
                "brand"=>"Moonlight",
                "brand_image"=>"1675153762.png",
                "is_homepage"=>1,
                "brand_status"=>1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id"=>2,
                "brand"=>"Levi's",
                "brand_image"=>"1675260335.jpg",
                "is_homepage"=>1,
                "brand_status"=>1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id"=>3,
                "brand"=>"Arrow",
                "brand_image"=>"1675260427.png",
                "is_homepage"=>1,
                "brand_status"=>1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id"=>4,
                "brand"=>"Blackberrys",
                "brand_image"=>"1675260449.png",
                "is_homepage"=>1,
                "brand_status"=>1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id"=>5,
                "brand"=>"Jack & Jones",
                "brand_image"=>"1675260475.png",
                "is_homepage"=>1,
                "brand_status"=>1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id"=>6,
                "brand"=>"Louis Philippe",
                "brand_image"=>"1675260571.jpg",
                "is_homepage"=>1,
                "brand_status"=>1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id"=>7,
                "brand"=>"Mufti",
                "brand_image"=>"1675260592.png",
                "is_homepage"=>1,
                "brand_status"=>1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id"=>8,
                "brand"=>"Pepe Jeans",
                "brand_image"=>"1675260609.png",
                "is_homepage"=>1,
                "brand_status"=>1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id"=>9,
                "brand"=>"Nike",
                "brand_image"=>"1675260632.png",
                "is_homepage"=>1,
                "brand_status"=>1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id"=>10,
                "brand"=>"Adidas",
                "brand_image"=>"1675260652.png",
                "is_homepage"=>1,
                "brand_status"=>1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "id"=>11,
                "brand"=>"Fila",
                "brand_image"=>"1675260676.png",
                "is_homepage"=>1,
                "brand_status"=>1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ]
        ];
        DB::table("brands")
        ->insert($data);
    }
}
