<?php

declare(strict_types=1);

namespace App\Modules\Poster\Models;

use Database\Factories\PosterFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'file_name',
    ];

    protected function path(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => "assets/images/posters/{$attributes['file_name']}",
        );
    }

    protected static function newFactory(): PosterFactory
    {
        return PosterFactory::new();
    }
}
