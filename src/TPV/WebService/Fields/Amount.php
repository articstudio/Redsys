<?php

namespace Articstudio\Redsys\TPV\Webservice\Fields;

use Articstudio\Redsys\TPV\Common\Fields\Amount as AbstractAmount;

class Amount extends AbstractAmount
{

  public static function getOutputKey()
  {
    return 'DS_MERCHANT_AMOUNT';
  }

}
