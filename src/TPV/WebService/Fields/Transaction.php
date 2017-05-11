<?php

namespace Articstudio\Redsys\TPV\Webservice\Fields;

use Articstudio\Redsys\TPV\Common\Fields\Transaction as AbstractTransaction;

class Transaction extends AbstractTransaction
{
  
  public static function getOutputKey()
  {
    return 'DS_MERCHANT_TRANSACTIONTYPE';
  }
  
}