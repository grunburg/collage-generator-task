<?php

namespace App\Modules\Poster\Models;

use Database\Factories\PosterFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    use HasFactory;

    /** @var string[] */
    protected $fillable = [
        'name',
        'path',
    ];

    protected static function newFactory(): PosterFactory
    {
        return PosterFactory::new();
    }
}
