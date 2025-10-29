<?php

namespace App\Services\Calendar;

use App\Models\CalendarAccount;
use App\Services\Calendar\Contracts\CalendarProvider;
use App\Services\Calendar\Exceptions\UnknownCalendarProviderException;
use Illuminate\Contracts\Container\Container;

class CalendarProviderManager
{
    /** @var array<string, class-string<CalendarProvider>> */
    private array $providers;

    public function __construct(
        private readonly Container $container,
        array $providers
    ) {
        $this->providers = $providers;
    }

    public function provider(string $provider): CalendarProvider
    {
        $provider = strtolower($provider);

        if (! array_key_exists($provider, $this->providers)) {
            throw UnknownCalendarProviderException::make($provider);
        }

        return $this->container->make($this->providers[$provider]);
    }

    public function forAccount(CalendarAccount $account): CalendarProvider
    {
        return $this->provider($account->provider);
    }
}
