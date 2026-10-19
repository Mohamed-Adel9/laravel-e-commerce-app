<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->name();
        return [
            //
            'brand_id' => Brand::inRandomOrder()->value('id'),
            'category_id' => Category::inRandomOrder()->value('id'),
            'name' => $name,
            'slug' => Str::slug($name.'-'.uniqid()),
            'regular_price' => $this->faker->numberBetween(100 ,999),
            'sale_price' => $this->faker->numberBetween( 100, 999),
            'SKU' =>strtoupper(Str::random(10)),
            'stock_quantity' =>$this->faker->numberBetween(1, 100),
            'stock_status' =>$this->faker->randomElement(['in_stock', 'out_of_stock']),
            'featured' => $this->faker->randomElement(['yes', 'no']),
            'short_description' => $this->faker->sentence(10),
            'description' => $this->faker->paragraph(5),
            'status' => $this->faker->randomElement(['draft', 'published']),
            'thumbnail' => $this->faker->imageUrl(640, 480),
            'created_by' => User::inRandomOrder()->value('id')??User::factory(),
        ];
    }
}
