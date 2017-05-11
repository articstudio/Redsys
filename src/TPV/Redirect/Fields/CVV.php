<?php

namespace Articstudio\Redsys\TPV\Redirect\Fields;

use Articstudio\Redsys\TPV\Common\Fields\CVV as AbstractCVV;

class CVV extends AbstractCVV
{
  
  public static function getOutputKey()
  {
    return 'Ds_Merchant_CVV2';
  }
  
}