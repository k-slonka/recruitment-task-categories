<?php

namespace App\Listeners;

use App\Events\AddCategory;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Notification;

class SendCategoryNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\AddCategory  $event
     * @return void
     */
    public function handle(AddCategory $event)
    {
        Notification::route('mail', 'test@test.com')->notify(new EmailNotification($event));
    }
}
