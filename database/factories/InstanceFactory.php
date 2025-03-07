<?php

namespace Database\Factories;

use App\Models\Instance;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstanceFactory extends Factory
{
    protected $model = Instance::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'realm' => fake()->word(),
            'linux_user' => fake()->userName(),
            'domain' => fake()->domainName(),
        ];
    }
}
