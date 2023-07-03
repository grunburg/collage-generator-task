<?php

declare(strict_types=1);

namespace App\Modules\Collage\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Collage extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'file_name',
    ];

    protected function path(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => "/storage/collages/{$attributes['file_name']}",
        );
    }
}
