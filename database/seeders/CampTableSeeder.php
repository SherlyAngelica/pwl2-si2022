<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\camp;

class CampTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     */
    public function run() :void
    {
        $camps = [
        [
            'title' => "Level Up Package",
            'slug' =>  "Paket mewah",
            'price' => 250, 
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ], 
        [
            'title' => "Starter Package",
            'slug' =>  "Paket dasar",
            'price' => 90, 
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ]
    ];
        // foreach($camps as $key => $camp) {
        //     CampTable::create($camp);
        // }

        Camp::insert($camps);
    }
}
