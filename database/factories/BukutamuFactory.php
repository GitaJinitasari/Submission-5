<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

// /**
//  * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bukutamu>
//  */
class BukutamuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama'=>$this->faker->name(),
            'whatsApp'=>$this->faker->phoneNumber(),
            'alamat'=>$this->faker->address()
        ];
    }
}
