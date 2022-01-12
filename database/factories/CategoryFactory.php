<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_name' => $this->faker->word(),
            'category_description' => $this->faker->text(),
            'status' => $this->faker->randomElement(array('0','1')),
            'created_by' => $this->faker->numberBetween(1,1),
        ];
    }
}
