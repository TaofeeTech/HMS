<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected static ?string $password;


    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'username' => fake()->userName(),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'role' => 'admin',
            'status' => 1,
            'password' => static::$password ??= Hash::make('password')
        ];
    }
}
