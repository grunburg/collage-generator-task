<?php

declare(strict_types=1);

namespace App\Modules\Poster\Repositories;

use App\Modules\Poster\Models\Poster;
use Illuminate\Database\Eloquent\Collection;

readonly class PosterRepository
{
    /**
     * @param int[] $ids
     * @return Collection|Poster[]
     */
    public function getByIds(array $ids): Collection|array
    {
        return Poster::findMany($ids);
    }

    /**
     * @return Collection|Poster[]
     */
    public function getAll(): Collection|array
    {
        return Poster::all();
    }
}