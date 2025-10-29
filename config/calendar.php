<?php

use App\Services\Calendar\Providers\GoogleCalendarProvider;
use App\Services\Calendar\Providers\ICloudCalendarProvider;

return [
    'providers' => [
        'google' => GoogleCalendarProvider::class,
        'icloud' => ICloudCalendarProvider::class,
    ],
];
