<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\ServiceCategory;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $braidingCategory = ServiceCategory::where('name', 'Braiding Services')->first();
        $stylingCategory = ServiceCategory::where('name', 'Hair Styling')->first();
        $careCategory = ServiceCategory::where('name', 'Hair Care')->first();

        $services = [
            // Braiding Services
            [
                'name' => 'Box Braids',
                'description' => 'Classic box braids with premium synthetic hair',
                'price' => 120.00,
                'duration' => 180,
                'category_id' => $braidingCategory->id,
                'is_active' => true,
            ],
            [
                'name' => 'Knotless Braids',
                'description' => 'Modern knotless braids for a natural look',
                'price' => 150.00,
                'duration' => 210,
                'category_id' => $braidingCategory->id,
                'is_active' => true,
            ],
            [
                'name' => 'Goddess Braids',
                'description' => 'Elegant goddess braids with curly ends',
                'price' => 130.00,
                'duration' => 190,
                'category_id' => $braidingCategory->id,
                'is_active' => true,
            ],

            // Hair Styling
            [
                'name' => 'Blowout & Style',
                'description' => 'Professional blowout and styling',
                'price' => 45.00,
                'duration' => 60,
                'category_id' => $stylingCategory->id,
                'is_active' => true,
            ],
            [
                'name' => 'Updo Style',
                'description' => 'Elegant updo for special occasions',
                'price' => 65.00,
                'duration' => 90,
                'category_id' => $stylingCategory->id,
                'is_active' => true,
            ],

            // Hair Care
            [
                'name' => 'Deep Conditioning',
                'description' => 'Intensive hair treatment with organic products',
                'price' => 35.00,
                'duration' => 45,
                'category_id' => $careCategory->id,
                'is_active' => true,
            ],
            [
                'name' => 'Scalp Treatment',
                'description' => 'Soothing scalp treatment and massage',
                'price' => 40.00,
                'duration' => 50,
                'category_id' => $careCategory->id,
                'is_active' => true,
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}