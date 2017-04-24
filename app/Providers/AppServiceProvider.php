<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Billing\Stripe;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('layouts.nav', function ($view){

          $archives = \App\Post::archives();
          $tags = \App\Tag::has('posts')->pluck('name');

          $view->with(compact('archives', 'tags'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      // \App::singleton(Stripe::class, function() {
      $this->app->singleton(Stripe::class, function() {
        return new Stripe(config('services.stripe.secret'));
      });

      //The following  three lines do the same thing.
      //$stripe = App::make('App\Billing\Stripe');
      //$stripe = app('App\Billing\Stripe');
      //$stripe = resolve('App\Billing\Stripe');
    }
}
