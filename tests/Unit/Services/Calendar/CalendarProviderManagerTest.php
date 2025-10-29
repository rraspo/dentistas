<?php

namespace Tests\Unit\Services\Calendar;

use App\Models\CalendarAccount;
use App\Services\Calendar\CalendarProviderManager;
use App\Services\Calendar\Exceptions\UnknownCalendarProviderException;
use App\Services\Calendar\Providers\GoogleCalendarProvider;
use Illuminate\Container\Container;
use PHPUnit\Framework\TestCase;

class CalendarProviderManagerTest extends TestCase
{
    public function test_it_resolves_a_registered_provider(): void
    {
        $container = new Container();
        $container->bind(GoogleCalendarProvider::class, fn () => new GoogleCalendarProvider());

        $manager = new CalendarProviderManager($container, [
            'google' => GoogleCalendarProvider::class,
        ]);

        $account = new CalendarAccount(['provider' => 'google']);

        $this->assertInstanceOf(GoogleCalendarProvider::class, $manager->forAccount($account));
    }

    public function test_it_fails_for_unregistered_provider(): void
    {
        $this->expectException(UnknownCalendarProviderException::class);

        $container = new Container();
        $manager = new CalendarProviderManager($container, []);

        $manager->provider('missing');
    }
}
