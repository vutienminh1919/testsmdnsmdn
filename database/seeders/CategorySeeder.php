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
        $category = new Category();
        $category->name = 'family';
        $category->description = 'FAMILY';
        $category->save();

        $category = new Category();
        $category->name = 'job';
        $category->description = 'JOB';
        $category->save();

        $category = new Category();
        $category->name = 'school';
        $category->description = 'SCHOOL';
        $category->save();

        $category = new Category();
        $category->name = 'personal';
        $category->description = 'PERSONAL';
        $category->save();

    }
}
