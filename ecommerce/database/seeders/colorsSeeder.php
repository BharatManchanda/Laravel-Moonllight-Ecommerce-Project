<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class colorsSeeder extends Seeder
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
                "id"=>1,
                "color"=>"Yellow",
                "color_status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s")
            ],
            [  
                "id"=>2,
                "color"=>"Pink",
                "color_status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s")
            ],
            [  
                "id"=>3,
                "color"=>"Black",
                "color_status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s")
            ],
            [  
                "id"=>4,
                "color"=>"Green",
                "color_status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s")
            ],
            [  
                "id"=>5,
                "color"=>"Blue",
                "color_status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s")
            ],
            [  
                "id"=>6,
                "color"=>"Gray",
                "color_status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s")
            ],
            [  
                "id"=>7,
                "color"=>"Red",
                "color_status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s")
            ],
            [  
                "id"=>8,
                "color"=>"Brown",
                "color_status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s")
            ],
            [  
                "id"=>9,
                "color"=>"Silver",
                "color_status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s")
            ],
            [  
                "id"=>10,
                "color"=>"Orange",
                "color_status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s")
            ],
            [  
                "id"=>11,
                "color"=>"Sky",
                "color_status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s")
            ],
            [  
                "id"=>12,
                "color"=>"White",
                "color_status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s")
            ],
            [  
                "id"=>14,
                "color"=>"Maroon",
                "color_status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s")
            ],
            [  
                "id"=>15,
                "color"=>"Cream",
                "color_status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s")
            ],
            [  
                "id"=>16,
                "color"=>"Gold",
                "color_status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s")
            ],
            [  
                "id"=>17,
                "color"=>"Peach",
                "color_status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s")
            ],
            [  
                "id"=>18,
                "color"=>"Khaki",
                "color_status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s")
            ],
            [  
                "id"=>19,
                "color"=>"Beige",
                "color_status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s")
            ],
            [  
                "id"=>20,
                "color"=>"Violet",
                "color_status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s")
            ],
            [  
                "id"=>21,
                "color"=>"Magenta",
                "color_status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s")
            ],
            [  
                "id"=>22,
                "color"=>"Purple",
                "color_status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s")
            ],
            [  
                "id"=>23,
                "color"=>"Lime",
                "color_status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s")
            ],
            [  
                "id"=>24,
                "color"=>"Olive",
                "color_status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s")
            ],
            [  
                "id"=>25,
                "color"=>"Teal",
                "color_status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s")
            ],
            [  
                "id"=>26,
                "color"=>"Aqua",
                "color_status"=>1,
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s")
            ]
            ];
            DB::table("colors")
            ->insert($data);
    }
}
