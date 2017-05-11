<?php

namespace Articstudio\Redsys\TPV\Webservice\Fields;

use Articstudio\Redsys\TPV\Common\Fields\Currency as AbstractCurrency;

class Currency extends AbstractCurrency
{

  public static function getOutputKey()
  {
    return 'DS_MERCHANT_CURRENCY';
  }

}
