<?php

use App\Models\Opinion;
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OpinionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(){
        return [
            'fullname' => $this->faker->name,
            'gender' => $this->faker->numberBetween(1,2),
            'email' => $this->faker->safeEmail,
            'postcode' => $this->faker->numberBetween(100,999).'-'.$this->faker->numberBetween(1000,9999),
            'address' => $this->faker->state.$this->faker->city,
            'building_name' => $this->faker->text(5).'ビル',
            'opinion' => $this->faker->sentence
        ];
    }
}