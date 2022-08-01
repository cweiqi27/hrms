<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Employee;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Leave>
 */
class LeaveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "leave_start_date" => $this->faker->date("Y-m-d"),
            "leave_end_date" => $this->faker->date("Y-m-d"),
            "leave_start_time" => $this->faker->time("H:i:s"),
            "leave_end_time" => $this->faker->time("H:i:s"),
            "leave_type" => $this->faker->word(),
            "employee_id" => rand(1, 10),
        ];
    }
}
