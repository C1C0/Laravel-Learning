<?php

namespace App\Providers;

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
                return new Newsletter(new ApiClient(), 'bar');
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
