<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Billing\Stripe;
use Illuminate\Support\Facades\Schema;
use App\Post;
use App\Tag;

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

      $archives = Post::archives();
      $tags = Tag::has('posts')->pluck('name');

      $view->with(compact('archives', 'tags'));
    });

    // view()->composer('layouts.carousel', function ($view){
    //
    //   $lastPosts = Post::currentMonthPosts();
    //   $view->with(compact('lastPosts'));
    // });

    view()->composer('tags.show', function ($view){

      $tags = Tag::all();
      $view->with(compact('tags'));
    });

    view()->composer('tags.edit', function ($view){

      $tags = Tag::all();
      $view->with(compact('tags'));
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
