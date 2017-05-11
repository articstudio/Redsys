<?php

namespace Articstudio\Redsys\TPV\Common\TPV;

use Articstudio\Redsys\TPV\Common\Contracts\TPV as TPVContract;
use Traversable;
use Articstudio\Redsys\TPV\Common\Contracts\Request as RequestContract;
use Articstudio\Redsys\TPV\Common\Contracts\Signature as SignatureContract;
use Articstudio\Redsys\TPV\Common\Contracts\Environment as EnvironmentContract;

abstract class TPV implements TPVContract
{

  private $request;
  private $signature;
  private $environment;

  public function __construct(EnvironmentContract $environment, SignatureContract $signature, $request = [])
  {
    $this->setEnvironment($environment);
    $this->setSignature($signature);
    if (is_array($request) || $request instanceof Traversable)
    {
      $request = static::createRequest($request);
    }
    if (!$request instanceof RequestContract)
    {
      throw new InvalidArgumentException('Expected a \Articstudio\Redsys\TPV\Webservice\Contracts\Request');
    }
    $this->setRequest($request);
  }

  public function setRequest(RequestContract $request)
  {
    $this->request = $request;
  }

  public function getRequest()
  {
    return $this->request;
  }

  public function getSignature()
  {
    return $this->signature;
  }

  public function setSignature(SignatureContract $signature)
  {
    $this->signature = $signature;
  }

  public function getEnvironment()
  {
    return $this->environment;
  }

  public function setEnvironment(EnvironmentContract $environment)
  {
    $this->environment = $environment;
  }

}
