<?php

namespace Articstudio\Redsys\TPV\Webservice\Environment;

use Articstudio\Redsys\TPV\Common\Environment\Environment as AbstractEnvironment;

class TestEnvironment extends AbstractEnvironment
{
  
  protected $url = 'https://sis-t.redsys.es:25443/sis/services/SerClsWSEntrada';
  
}