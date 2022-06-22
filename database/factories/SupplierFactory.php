<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $supplier_name = $this->faker->unique()->words($nb=2, $asText=true);
        $slug = Str::slug($supplier_name);
        return [
            'name' => $supplier_name,
            'slug' => $slug,
            'logo' => 'logo_' . $this->faker->unique()->numberBetween(1,6) . '.png',
            'description' => $this->faker->text(500)
        ];
    }
}
