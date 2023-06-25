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
        Category::query()->delete();

        Category::insert([
            [
                "name" => "Bahroma",
                "status"=>1
            ],
            [
                "name" => "Bubon",
                "status"=>1
            ],
            [
                "name" => "Kolso",
                "status"=>1
            ],
            [
                "name" => "Derjatel",
                "status"=>1
            ],
            [
                "name" => "Karsaj",
                "status"=>1
            ],
            [
                "name" => "Baget",
                "status"=>1
            ],
            [
                "name" => "Magnit",
                "status"=>1
            ],
            [
                "name" => "Parda",
                "status"=>1
            ],
            [
                "name" => "Lipuchka",
                "status"=>1
            ],
        ]);
    }
}
