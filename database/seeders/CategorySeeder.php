<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Fiksi', 'description' => 'Buku cerita fiksi dan novel'],
            ['name' => 'Non-Fiksi', 'description' => 'Buku berdasarkan fakta dan realita'],
            ['name' => 'Teknologi', 'description' => 'Buku tentang teknologi dan komputer'],
            ['name' => 'Pendidikan', 'description' => 'Buku materi pembelajaran'],
            ['name' => 'Sejarah', 'description' => 'Buku tentang sejarah dan peradaban'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}