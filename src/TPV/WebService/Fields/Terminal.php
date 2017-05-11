<?php

namespace Articstudio\Redsys\TPV\Webservice\Fields;

use Articstudio\Redsys\TPV\Common\Fields\Terminal as AbstractTerminal;

class Terminal extends AbstractTerminal
{
  
  public static function getOutputKey()
  {
    return 'DS_MERCHANT_TERMINAL';
  }
  
}