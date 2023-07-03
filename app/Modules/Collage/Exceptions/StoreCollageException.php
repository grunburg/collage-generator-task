<?php

namespace App\Modules\Collage\Exceptions;

class StoreCollageException extends CollageException
{
    public const SAVE_FAILED = 'There was an issue saving generated collage.';
}
