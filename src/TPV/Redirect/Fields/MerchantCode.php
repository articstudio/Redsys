<?php

namespace Articstudio\Redsys\TPV\Redirect\Fields;

use Articstudio\Redsys\TPV\Common\Fields\MerchantCode as AbstractMerchantCode;

class MerchantCode extends AbstractMerchantCode
{
  
  public static function getOutputKey()
  {
    return 'Ds_Merchant_MerchantCode';
  }
  
}