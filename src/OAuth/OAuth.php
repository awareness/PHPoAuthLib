<?php namespace OAuth;

use Config;
use OAuth\Common\Consumer\Credentials;
use OAuth\Common\Storage\Session;

class OAuth {

  protected static $service_factory;

  public function getServiceFactory() {
    if (!static::$service_factory) {
      static::$service_factory = new ServiceFactory();
    }
    return static::$service_factory;
  }

  public function createService($name, $creds=null) {
    return $this->getServiceFactory()->createService(
      $name,
      $this->getCredentials($name, $creds),
      new Session()
    );
  }

  public function getCredentials($name, $creds=null) {
    $creds = $creds ?: Config::get("oauth.$name");
    return new Credentials(
      $creds['id'],
      $creds['secret'],
      $creds['callback_url']
    );
  }

}
