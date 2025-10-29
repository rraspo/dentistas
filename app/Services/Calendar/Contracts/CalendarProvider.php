<?php

namespace App\Services\Calendar\Contracts;

use App\Models\CalendarAccount;
use Illuminate\Support\Collection;

interface CalendarProvider
{
    /**
     * Retrieve the list of calendars available for the account.
     *
     * @return Collection<int, mixed>
     */
    public function listCalendars(CalendarAccount $account): Collection;

    /**
     * Synchronise events for the account.
     *
     * @param array<string, mixed>|null $options
     * @return Collection<int, mixed>
     */
    public function syncEvents(CalendarAccount $account, ?array $options = null): Collection;
}
