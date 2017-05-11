<?php

namespace Articstudio\Redsys\TPV\Webservice\Fields;

use Articstudio\Redsys\TPV\Common\Fields\CardExpire as AbstractCardExpire;

class CardExpire extends AbstractCardExpire
{
  
  public static function getOutputKey()
  {
    return 'DS_MERCHANT_EXPIRYDATE';
  }
  
}