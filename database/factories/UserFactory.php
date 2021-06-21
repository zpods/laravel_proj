<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name' => $this->faker->name,
            'email' => 'a@a.pl',
            'email_verified_at' => now(),
            'password' => bcrypt('aaaaaaaa'), // password
            'remember_token' => Str::random(10),
            'country' => $this->faker->word(true),
            'city' => $this->faker->word(true),
            'street' => $this->faker->word(true),

        ];
    }
}
