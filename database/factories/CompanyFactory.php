<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'company_name' => fake()->word(),
            'contact_firstname' => fake()->firstName(),
            'contact_lastname' => fake()->lastName(),
            'contact_email' => fake()->safeEmail(),
            'acquired_on' => fake()->date(),
            'customer_status' => fake()->word()
        ];
    }
}
