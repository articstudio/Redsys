<?php

namespace Articstudio\Redsys\TPV\Redirect\Fields;

use Articstudio\Redsys\TPV\Common\Fields\MerchantName as AbstractMerchantName;

class MerchantName extends AbstractMerchantName
{
  
  public static function getOutputKey()
  {
    return 'Ds_Merchant_MerchantName';
  }
  
}