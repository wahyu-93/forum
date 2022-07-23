<?php

namespace Database\Factories\Forum;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ThreadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'   => $this->faker->sentence(5),
            'slug'    => Str::slug($this->faker->sentence()),
            'user_id' => rand(1,2),
            'tag_id'  => rand(1,3),
            'body'    => $this->faker->paragraph(15)
        ];
    }
}
