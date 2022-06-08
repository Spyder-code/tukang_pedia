<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Komputer', 'icon' => 'fas fa-list'],
            ['name' => 'Handphone', 'icon' => 'fas fa-list'],
            ['name' => 'Elektronik', 'icon' => 'fas fa-list'],
            ['name' => 'Fashion', 'icon' => 'fas fa-list'],
            ['name' => 'Otomotif', 'icon' => 'fas fa-list'],
        ];

        Category::insert($data);
    }
}
