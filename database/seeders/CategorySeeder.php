<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Technology',

            ],
            [
                'name' => 'Business',

            ],
            [
                'name' => 'Education',

            ],
            [
                'name' => 'Sports',

            ],
            [
                'name' => 'Food',

            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                $category
            );
        }
    }
}
