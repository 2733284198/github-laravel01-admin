<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0; $i < 10; $i++) {
            DB::table('shops')->insert([
                'name' => "name_". Str::random(3),
                'desc' => "desc_" .Str::random(3),

//                'created_at' => 'datetime:Y-m-d H:i:s',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

//                'updated_at' => 'datetime:Y-m-d H:i:s',

//            'create_at' => date_time(),
//            'update_at' => date_create(),
            ]);
        }
    }
}
