<?php

namespace App\Modules\Collage\Exceptions;

class InvalidImagePathException extends CollageException
{
    public const INVALID_PATH = 'An invalid image path was provided for "%s".';
}
