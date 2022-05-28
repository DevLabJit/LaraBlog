<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class PostFactory extends Factory
{


    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {


        return [
            
            'title'=> $this->faker->sentence($nbWords = 6, $variableNbWords = true),  
            'slug' => Str::slug($this->faker->sentence($nbWords = 6, $variableNbWords = true), '-'),
            'content' => $this->faker->text($maxNbChars = 200),
            'image' => $this->faker->image,
            'category_id' => Category::pluck('id')->random(),
            'user_id' => User::pluck('id')->random(),
        ];
    }
}
