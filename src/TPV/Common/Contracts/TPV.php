<?php

namespace Articstudio\Redsys\TPV\Common\Contracts;

use Articstudio\Redsys\TPV\Common\Contracts\Request as RequestContract;
use Articstudio\Redsys\TPV\Common\Contracts\Signature as SignatureContract;
use Articstudio\Redsys\TPV\Common\Contracts\Environment as EnvironmentContract;

interface TPV
{

  public function __construct(EnvironmentContract $environment, SignatureContract $signature, $request = []);

  public function getRequest();

  public function setRequest(RequestContract $request);

  public static function createRequest($fields = []);

  public function getSignature();

  public function setSignature(SignatureContract $signature);

  public function getEnvironment();

  public function setEnvironment(EnvironmentContract $environment);
  
  public function processResponse($response);
}
