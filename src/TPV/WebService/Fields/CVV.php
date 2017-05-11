<?php

namespace Articstudio\Redsys\TPV\Webservice\Fields;

use Articstudio\Redsys\TPV\Common\Fields\CVV as AbstractCVV;

class CVV extends AbstractCVV
{
  
  public static function getOutputKey()
  {
    return 'DS_MERCHANT_CVV2';
  }
  
}