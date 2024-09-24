<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

        $job_dsks = ['Receptionist', 'director', 'Auditor', 'Sectary'];

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'username' => fake()->unique()->username(),
            'address' => fake()->unique()->address(),
            'phone' => fake()->unique()->phoneNumber(),
            'bio' => fake()->paragraph(3),
            'job_dsk' => $job_dsks[rand(0, count($job_dsks) -1)],
            // 'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }
}
