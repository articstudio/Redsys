<?php

namespace Articstudio\Redsys\TPV\Webservice\Fields;

use Articstudio\Redsys\TPV\Common\Fields\MerchantCode as AbstractMerchantCode;

class MerchantCode extends AbstractMerchantCode
{
  
  public static function getOutputKey()
  {
    return 'DS_MERCHANT_MERCHANTCODE';
  }
  
}