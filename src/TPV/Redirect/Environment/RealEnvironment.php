<?php

namespace Articstudio\Redsys\TPV\Redirect\Environment;

use Articstudio\Redsys\TPV\Common\Environment\Environment as AbstractEnvironment;

class RealEnvironment extends AbstractEnvironment
{
  
  protected $url = 'https://sis.redsys.es/sis/realizarPago';
  
}