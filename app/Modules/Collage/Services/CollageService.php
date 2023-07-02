<?php

declare(strict_types=1);

namespace App\Modules\Collage\Services;

class CollageService
{
    public function __construct(
        private readonly CollageGeneratorService $generator,
    ) {}

    public function create()
    {
        //
    }
}