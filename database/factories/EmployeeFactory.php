<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'employee_name' => $this->faker->name(),
            'employee_email' => $this->faker->unique()->safeEmail(),
            'employee_contact_no' => $this->faker->unique()->numerify(),
            'status' => $this->faker->text(10),
            'salary' => $this->faker->randomFloat(2),
            'department' => $this->faker->text(20),
        ];
    }
}
