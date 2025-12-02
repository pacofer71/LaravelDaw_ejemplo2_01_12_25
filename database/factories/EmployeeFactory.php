<?php

namespace Database\Factories;

use App\Models\Department;
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
    public function definition(): array
    {
        $username=fake()->unique()->userName();
        $departamentos=Department::all();
        return [
            'username'=>$username,
            'email'=>$username."@".fake()->freeEmailDomain(),
            'activo'=>fake()->randomElement(['Si', 'No']),
            'department_id'=>$departamentos->random()->id,
        ];
    }
}
