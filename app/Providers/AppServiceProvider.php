<?php

namespace App\Providers;

use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//      $this->app->bind();
        app()->bind(
            Newsletter::class,
            function () {
                $client = (new ApiClient())->setConfig(
                    [
                        'apiKey' => config('services.mailchimp.key'),
                        'server' => 'us6',
                    ]
                );
                return new MailchimpNewsletter($client);
            }
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // NEVER ever do this with combination such as:
        // <Model_name>::create(request()->all())
        Model::unguard();
    }
}
