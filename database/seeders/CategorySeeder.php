<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Manga',
                'created_at' => now(),

            ],
            [
                'name' => 'Novel',
                'created_at' => now(),
            ],
            [
                'name' => 'Self Improvement',
                'created_at' => now(),
            ],
            [
                'name' => 'History',
                'created_at' => now(),
            ],
            [
                'name' => 'Science',
                'created_at' => now(),
            ],
        ]);
    }
}
