<?php

namespace Articstudio\Redsys\TPV\Redirect\Fields;

use Articstudio\Redsys\TPV\Common\Fields\Order as AbstractOrder;

class Order extends AbstractOrder
{
  
  public static function getOutputKey()
  {
    return 'Ds_Merchant_Order';
  }
  
}