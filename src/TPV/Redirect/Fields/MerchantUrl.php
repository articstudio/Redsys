<?php

namespace Articstudio\Redsys\TPV\Redirect\Fields;

use Articstudio\Redsys\TPV\Common\Fields\MerchantUrl as AbstractMerchantUrl;

class MerchantUrl extends AbstractMerchantUrl
{
  
  public static function getOutputKey()
  {
    return 'Ds_Merchant_MerchantURL';
  }
  
}