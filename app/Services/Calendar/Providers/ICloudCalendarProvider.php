<?php

namespace App\Services\Calendar\Providers;

use App\Models\CalendarAccount;
use App\Services\Calendar\Contracts\CalendarProvider;
use Illuminate\Support\Collection;

class ICloudCalendarProvider implements CalendarProvider
{
    public function listCalendars(CalendarAccount $account): Collection
    {
        return collect();
    }

    public function syncEvents(CalendarAccount $account, ?array $options = null): Collection
    {
        return collect();
    }
}
