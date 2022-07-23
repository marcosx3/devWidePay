<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Way>
 */
class WayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'user_id'=> User::all()->random()->id,
           'url' =>$this->faker->url(),
           'active' =>true,
           'created_at' => $this->faker->dateTime(),
        ];
    }
}
