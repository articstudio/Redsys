<?php

namespace Articstudio\Redsys\TPV\Webservice\Fields;

use Articstudio\Redsys\TPV\Common\Fields\CardNumber as AbstractCardNumber;

class CardNumber extends AbstractCardNumber
{
  
  public static function getOutputKey()
  {
    return 'DS_MERCHANT_PAN';
  }
  
}