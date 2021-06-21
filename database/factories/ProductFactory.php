<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $categories = Category::all();

        // $items = [];
        // foreach($categories as $cat){
        //     $items[] = $cat->category_id;
        // }

        return [
            'name' => $this->faker->word() ,
            'quantity' => $this->faker->numberBetween(1, 111),
            'price'=> $this->faker->numberBetween(5, 122),
            'short_description' => $this->faker->words(6, true),
            'description' => $this->faker->text(500),

        ];
    }
}
