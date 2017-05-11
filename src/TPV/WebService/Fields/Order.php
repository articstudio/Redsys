<?php

namespace Articstudio\Redsys\TPV\Webservice\Fields;

use Articstudio\Redsys\TPV\Common\Fields\Order as AbstractOrder;

class Order extends AbstractOrder
{
  
  public static function getOutputKey()
  {
    return 'DS_MERCHANT_ORDER';
  }
  
}