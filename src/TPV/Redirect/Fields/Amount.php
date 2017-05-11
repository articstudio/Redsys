<?php

namespace Articstudio\Redsys\TPV\Redirect\Fields;

use Articstudio\Redsys\TPV\Common\Fields\Amount as AbstractAmount;

class Amount extends AbstractAmount
{

  public static function getOutputKey()
  {
    return 'Ds_Merchant_Amount';
  }

}
