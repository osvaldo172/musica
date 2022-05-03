<?php

namespace App\Providers;

use BeyondCode\Mailbox\Drivers\Log;
use Illuminate\Support\ServiceProvider;
use BeyondCode\Mailbox\InboundEmail;
use BeyondCode\Mailbox\Facades\Mailbox;

class MailBoxServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Mailbox::from('test@beyondco.de', function (InboundEmail $email) {
            \Illuminate\Support\Facades\Log::info("hola mailbox");
            //Log::info($email);
        });


        Mailbox::to('test@beyondco.de', function (InboundEmail $email) {
            \Illuminate\Support\Facades\Log::info("hola mailbox to");
            //\Illuminate\Support\Facades\Log::info($email);
        });

        Mailbox::to('test2@beyondco.de', function (InboundEmail $email) {
            \Illuminate\Support\Facades\Log::info("hola mailbox to");
            //\Illuminate\Support\Facades\Log::info($email);
        });

    }
}
