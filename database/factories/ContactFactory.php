<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'gender' => $this->faker->randomElement(['男性', '女性', 'その他']),
            'email' => $this->faker->unique()->safeEmail,
            'tel' => $this->faker->numerify('####'),
            'address' => $this->faker->address,
            'category_id' => Category::inRandomOrder()->first()->id ?? 1,
            'content' => $this->faker->realText(50),
            'created_at' => $this->faker->date(),
        ];
    }
}
