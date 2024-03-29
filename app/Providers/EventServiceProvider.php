<?php

namespace App\Providers;

use App\Events\BadgeAward;
use App\Events\PlusReps;
use App\Listeners\CommentNotification;
use App\Events\NewComment;
use App\Listeners\AwardNotify;
use App\Listeners\PlusRepsNotify;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewComment::class => [
            [CommentNotification::class, "handle"],
        ],
        BadgeAward::class => [
            [AwardNotify::class, "handle"],
        ],
        PlusReps::class => [
            [PlusRepsNotify::class, "handle"]
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
