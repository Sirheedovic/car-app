<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    protected $model = Car::class;
      
     
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'founded' => fake()->year(),
            'description' => fake()->paragraph(),
            'created_at' => now(),
            
        ];
    }
}
