<?php

declare(strict_types=1);

namespace App\Modules\Collage\Models;

use Illuminate\Database\Eloquent\Model;

class Collage extends Model
{
    /** @var string[] */
    protected $fillable = [
        'path',
    ];
}
