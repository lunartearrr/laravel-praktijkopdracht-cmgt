<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;

class RecordLogin
{
    public function handle(Login $event): void
    {
        $event->user->logins()->create();
    }
}
