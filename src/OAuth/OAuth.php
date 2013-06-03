<?php namespace OAuth;

use Common\Consumer;

class OAuth {

  protected static $service_factory;

  public function getServiceFactory() {
    if (!static::$service_factory) {
      static::$service_factory = new ServiceFactory();
    }
    return static::$service_factory;
  }

  public function createService($name) {
    return $this->getServiceFactory()->createService($name, $this->getCredentials($name));
  }

  public function getCredentials($name) {
    $creds = Config::get("oauth.$name");
    return new Consumer(
      $creds['id'],
      $creds['secret'],
      $creds['callback_url']
    );
  }

}
