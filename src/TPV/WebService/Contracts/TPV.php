<?php

namespace Articstudio\Redsys\TPV\Webservice\Contracts;

use Articstudio\Redsys\TPV\Common\Contracts\TPV as TPVContract;

interface TPV extends TPVContract
{
  
  public function call();
  
}