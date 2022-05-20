<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
     /**
     * 
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /* Se crean etiqueta de prueba */
        $name = $this->faker->unique()->randomElement(['China', 'Cisco', 'Chuwi', 'Comedia', 'Comic-Com', 'Core del sur', 'Cougar', 'Corsair', 'Cooler Master', 'Creative']);

        return [
            'name' => $name,
            'slug' => Str::slug($name)
        ];
    }
}
