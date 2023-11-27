<?php

namespace Taksu\TaksuInbox;

use Illuminate\Support\ServiceProvider as Base;

class InboxServiceProvider extends Base
{
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . "/../database/migrations");
    }
}
