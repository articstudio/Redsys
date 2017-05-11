<?php

namespace Articstudio\Redsys\TPV\Common\Signature;

use Articstudio\Redsys\TPV\Common\Contracts\Signature as SignatureContract;

abstract class Signature implements SignatureContract
{

  protected $version;
  private $secret;

  public function setVersion($version)
  {
    $this->version = $version;
  }

  public function getVersion()
  {
    return $this->version;
  }

  public function getSecret()
  {
    return $this->secret;
  }

  public function setSecret($secret)
  {
    $this->secret = $secret;
  }

}
