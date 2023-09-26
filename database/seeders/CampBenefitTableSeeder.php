<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\camp_benefits;

class CampBenefitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void 
    {
        $campBenefits = [
            [
                'camp_id' => 1,
                'name' => "Mentoring Programs",
            ], 
            [
                'camp_id' => 1,
                'name' => "Strong Networking",
            ], 
            [
                'camp_id' => 1,
                'name' => "Premium Design Kit",
            ], 
            [
                'camp_id' => 1,
                'name' => "Lifetime Course Video",
            ], 
            [
                'camp_id' => 1,
                'name' => "Profesional Portofolio",
            ], 
            [
                'camp_id' => 1,
                'name' => "Exclusive Certificate",
            ], 
            [
                'camp_id' => 2,
                'name' => "Lifetime Course Video",
            ], 
            [
                'camp_id' => 2,
                'name' => "Profesional Portofolio",
            ], 
            [
                'camp_id' => 2,
                'name' => "Exclusive Certificate",
            ], 
        ];
        Camp_benefits::insert($campBenefits);
    }
}
