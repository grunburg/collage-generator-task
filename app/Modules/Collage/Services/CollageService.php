<?php

declare(strict_types=1);

namespace App\Modules\Collage\Services;

use App\Modules\Collage\Exceptions\CollageException;
use App\Modules\Collage\Exceptions\InvalidImagePathException;
use App\Modules\Collage\Exceptions\StoreCollageException;
use App\Modules\Collage\Models\Collage;
use App\Modules\Collage\Repositories\CollageRepository;
use App\Modules\Poster\Models\Poster;
use App\Modules\Poster\Repositories\PosterRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

readonly class CollageService
{
    public function __construct(
        private CollageGeneratorService $generator,
        private PosterRepository $posterRepository,
        private CollageRepository $collageRepository,
    ) {}

    /**
     * @throws CollageException
     */
    public function generate(array $ids): void
    {
        $posters = $this->posterRepository->getByIds($ids);

        $paths = $posters
            ->sort(fn (Poster $a, Poster $b) => strcoll($a->name, $b->name))
            ->pluck('path');

        $this->validate($paths);

        $name = $this->getFileName();

        $collage = $this->generator->create($paths->toArray(), [362, 544]);
        if (! $this->store($name, $collage)) {
            throw new StoreCollageException(StoreCollageException::SAVE_FAILED);
        }

        $this->create(['file_name' => $name]);
    }

    /**
     * @throws InvalidImagePathException
     */
    private function validate(Collection $paths): void
    {
        $paths->each(function (string $path) {
            if (! file_exists($path)) {
                throw new InvalidImagePathException(
                    sprintf(InvalidImagePathException::INVALID_PATH, $path)
                );
            }
        });
    }

    private function getFileName(): string
    {
        return uniqid('collage') . '.png';
    }

    private function store(string $name, mixed $file): bool
    {
        return Storage::drive('public')->put("collages/{$name}", $file);
    }

    private function create(array $attributes = []): void
    {
        $this->collageRepository->save(Collage::make($attributes));
    }
}