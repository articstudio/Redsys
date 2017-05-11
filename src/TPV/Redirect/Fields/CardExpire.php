<?php

namespace Articstudio\Redsys\TPV\Redirect\Fields;

use Articstudio\Redsys\TPV\Common\Fields\CardExpire as AbstractCardExpire;

class CardExpire extends AbstractCardExpire
{
  
  public static function getOutputKey()
  {
    return 'Ds_Merchant_ExpiryDate';
  }
  
}