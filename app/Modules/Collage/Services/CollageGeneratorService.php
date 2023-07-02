<?php

declare(strict_types=1);

namespace App\Modules\Collage\Services;

use Intervention\Image\Facades\Image as ImageFacade;
use Intervention\Image\Image;

class CollageGeneratorService
{
    private const COLUMN_COUNT = 5;

    private const COLOR_TRANSPARENT = [0, 0, 0, 0];

    public function create(array $paths, array $size, int $space = 10): Image
    {
        [$imageWidth, $imageHeight] = $size;

        $canvas = $this->canvas($paths, $size, $space);

        foreach ($paths as $index => $path) {
            $image = ImageFacade::make($path)->resize($imageWidth, $imageHeight);

            $x = $index % self::COLUMN_COUNT * ($imageWidth + $space);
            $y = floor($index / self::COLUMN_COUNT) * ($imageHeight + $space);

            $canvas->insert($image, 'top-left', $x, $y);

            // Destroy the image instance to free up memory
            $image->destroy();
        }

        return $canvas->encode('png');
    }

    private function canvas(array $paths, array $size, int $space): Image
    {
        [$imageWidth, $imageHeight] = $size;
        $rowCount = ceil(count($paths) / self::COLUMN_COUNT);

        $canvasWidth = $imageWidth * self::COLUMN_COUNT + ($space - 1) * $space;
        $canvasHeight = $imageHeight * $rowCount + ($rowCount - 1) * $space;

        return ImageFacade::canvas($canvasWidth, $canvasHeight, self::COLOR_TRANSPARENT);
    }
}