<?php

namespace Database\Factories;

use App\Models\Not;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Not::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ogrenci_no' => null,
            'yazili_1' => null,
            'yazili_2' => null,
            'yazili_3' => null,
            'performans_1' => null,
            'performans_2' => null,
            'proje' => null
        ];
    }
}
