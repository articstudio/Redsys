<?php

namespace Articstudio\Redsys\TPV\Redirect\Fields;

use Articstudio\Redsys\TPV\Common\Fields\Terminal as AbstractTerminal;

class Terminal extends AbstractTerminal
{
  
  public static function getOutputKey()
  {
    return 'Ds_Merchant_Terminal';
  }
  
}