<?php

declare(strict_types=1);

namespace App\Modules\Collage\Repositories;

use App\Modules\Collage\Models\Collage;
use Illuminate\Database\Eloquent\Collection;

readonly class CollageRepository
{
    public function save(Collage $collage): bool
    {
        return $collage->save();
    }

    /**
     * @return Collection|Collage[]
     */
    public function getAll(): Collection|array
    {
        return Collage::all();
    }
}