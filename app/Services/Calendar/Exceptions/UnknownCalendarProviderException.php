<?php

namespace App\Services\Calendar\Exceptions;

use RuntimeException;

class UnknownCalendarProviderException extends RuntimeException
{
    public static function make(string $provider): self
    {
        return new self("Calendar provider [{$provider}] is not registered.");
    }
}
