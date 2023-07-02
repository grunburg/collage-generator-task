<?php

namespace App\Modules\Poster\Models;

use Carbon\Carbon;
use Database\Factories\PosterFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $path
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Poster extends Model
{
    use HasFactory;

    protected static function newFactory(): PosterFactory
    {
        return PosterFactory::new();
    }
}
