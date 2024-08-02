<?php

namespace Database\Seeders;
use App\Models\Category;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //MARK: - Category
        Category::factory()->create([
            'name' => 'Tiểu thuyết',
            'activate' => 0,
        ]);

        Category::factory()->create([
            'name' => 'Truyện ngắn',
            'activate' => 0,
        ]);

        Category::factory()->create([
            'name' => 'Sách phi hư cấu',
            'activate' => 0,
        ]);

        Category::factory()->create([
            'name' => 'Sách học thuật',
            'activate' => 0,
        ]);

        Category::factory()->create([
            'name' => 'Sách thiếu nhi',
            'activate' => 0,
        ]);

        Category::factory()->create([
            'name' => 'Sách tôn giáo',
            'activate' => 0,
        ]);

        Category::factory()->create([
            'name' => 'Sách nghệ thuật',
            'activate' => 0,
        ]);
    }
}
