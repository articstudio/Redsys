<?php

namespace Articstudio\Redsys\TPV\Common\Environment;

use Articstudio\Redsys\TPV\Common\Contracts\Environment as EnvironmentContract;

abstract class Environment implements EnvironmentContract
{

  protected $url;

  public function getURL()
  {
    return $this->url;
  }

  public function setURL($url)
  {
    $this->url = $url;
  }

}
