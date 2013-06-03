<?php namespace Oauth;

use Illuminate\Support\ServiceProvider;

class OauthServiceProvider extends ServiceProvider {

  /**
   * Indicates if loading of the provider is deferred.
   *
   * @var bool
   */
  protected $defer = false;

  /**
   * Bootstrap the application events.
   *
   * @return void
   */
  public function boot()
  {
    $this->package('awareness/oauth');
  }

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    $this->app['oauth'] = $this->app->share(function($app)
    {
      return new ServiceFactory;
    });
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides()
  {
    return array('oauth');
  }

}
