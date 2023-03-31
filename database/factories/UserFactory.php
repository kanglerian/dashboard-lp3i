<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nik' => $this->faker->randomNumber(7),
            'name' => $this->faker->name(),
            'username' => $this->faker->unique()->userName(),
            'password' => Hash::make('lerian123'),
            'role' => 'admin',
            'status' => false,
        ];
    }

}
