<?php

namespace Articstudio\Redsys\TPV\Redirect\Fields;

use Articstudio\Redsys\TPV\Common\Fields\CardNumber as AbstractCardNumber;

class CardNumber extends AbstractCardNumber
{
  
  public static function getOutputKey()
  {
    return 'Ds_Merchant_Pan';
  }
  
}