<?php

namespace App\Modules\Collage\Services;

use Intervention\Image\Facades\Image as Facade;
use Intervention\Image\Image;

class CollageGeneratorService
{
    private const COLUMN_COUNT = 5;

    private const COLOR_TRANSPARENT = [0, 0, 0, 0];

    public function create(array $paths, array $size, int $space = 10): Image
    {
        [$width, $height] = $size;

        $canvas = $this->canvas($paths, $width, $height, $space);

        foreach ($paths as $index => $path) {
            $image = Facade::make($path)->resize($width, $height);

            $x = $index % self::COLUMN_COUNT * ($width + $space);
            $y = floor($index / self::COLUMN_COUNT) * ($height + $space);

            $canvas->insert($image, 'top-left', $x, $y);

            // Destroy the image instance to free up memory
            $image->destroy();
        }

        return $canvas->encode('png');
    }

    /**
     * Create a new canvas based on image parameters.
     */
    private function canvas(array $paths, int $width, int $height, int $space): Image
    {
        $rows = ceil(count($paths) / self::COLUMN_COUNT);

        return Facade::canvas(
            $width * self::COLUMN_COUNT + ($space - 1) * $space,
            $height * $rows + ($rows - 1) * $space,
            self::COLOR_TRANSPARENT
        );
    }
}