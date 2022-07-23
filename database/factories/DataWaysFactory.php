<?php

namespace Database\Factories;

use App\Models\Way;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DataWaysFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
       
        
        return [
            'way_id'=> Way::all()->random()->id,
            'status_code' =>$this->faker->randomNumber(3,100,500),
            'body_response' => $this->faker->randomHtml(),
            'created_at' => $this->faker->dateTime(),
        ];
    }
}
