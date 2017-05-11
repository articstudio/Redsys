<?php

namespace Articstudio\Redsys\TPV\Redirect\Fields;

use Articstudio\Redsys\TPV\Common\Fields\MerchantData as AbstractMerchantData;

class MerchantData extends AbstractMerchantData
{
  
  public static function getOutputKey()
  {
    return 'Ds_Merchant_MerchantData';
  }
  
}