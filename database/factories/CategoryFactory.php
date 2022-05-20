<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
     /**
     * 
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
        /* $name = $this->faker->unique()->word(20); */
        $name = $this->faker->unique()->randomElement(['Tecnologia','videojuegos','Cultura','Guias','Productos']);

        return [
            'name' => $name,
            'slug' => Str::slug($name)
        ];
    }
}
