<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Animal;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Type;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Animal>
 */
class AnimalFactory extends Factory
{
    protected $model = Animal::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // numberBetween隨機產生範圍1到5之間的整數
            'type_id' => Type::all()->random()->id,
            'name' => $this->faker->name,
            'birthday' => $this->faker->date(),
            'area' => $this->faker->city,
            'fix' => $this->faker->boolean,
            'description' => $this->faker->text,
            'personality' => $this->faker->text,
            'user_id' => User::all()->random()->id
        ];
    }
}
