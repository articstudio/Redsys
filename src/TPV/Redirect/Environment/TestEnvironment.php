<?php

namespace Articstudio\Redsys\TPV\Redirect\Environment;

use Articstudio\Redsys\TPV\Common\Environment\Environment as AbstractEnvironment;

class TestEnvironment extends AbstractEnvironment
{
  
  protected $url = 'https://sis-t.redsys.es:25443/sis/realizarPago';
  
}