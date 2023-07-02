<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Modules\Poster\Models\Poster;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Modules\Poster\Models\Poster>
 */
class PosterFactory extends Factory
{
    protected $model = Poster::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
    }
}
