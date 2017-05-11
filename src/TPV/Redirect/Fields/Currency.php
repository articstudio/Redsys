<?php

namespace Articstudio\Redsys\TPV\Redirect\Fields;

use Articstudio\Redsys\TPV\Common\Fields\Currency as AbstractCurrency;

class Currency extends AbstractCurrency
{

  public static function getOutputKey()
  {
    return 'Ds_Merchant_Currency';
  }

}
