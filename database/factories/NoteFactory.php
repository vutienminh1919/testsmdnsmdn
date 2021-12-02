<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->name,
            'content'=>$this->faker->text(),
            'category_id' => Category::all()->random()->id,
            'user_id'=> User::all()->random()->id
        ];
    }
}
