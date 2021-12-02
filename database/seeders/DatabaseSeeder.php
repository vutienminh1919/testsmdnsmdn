<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(NoteSeeder::class);
        $this->call(CategorySeeder::class);
    }
}
