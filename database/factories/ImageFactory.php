<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
     /**
     * 
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /* Esto no funciona como deberia, antes si funcionaba pero ya no y es mejor ignorarlo */
        return [
            'url' => 'posts/' . $this->faker->image('public/storage/posts', 650, 480, null, false),
        ];
    }
}
