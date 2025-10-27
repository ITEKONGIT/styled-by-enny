<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServiceCategory;

class ServiceCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Braiding Services',
                'description' => 'Professional braiding styles for all hair types',
                'is_active' => true,
            ],
            [
                'name' => 'Hair Styling',
                'description' => 'Modern hair styling and finishing services',
                'is_active' => true,
            ],
            [
                'name' => 'Hair Care',
                'description' => 'Hair treatment and maintenance services',
                'is_active' => true,
            ]
        ];

        foreach ($categories as $category) {
            ServiceCategory::create($category);
        }
    }
}