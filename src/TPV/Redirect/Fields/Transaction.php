<?php

namespace Articstudio\Redsys\TPV\Redirect\Fields;

use Articstudio\Redsys\TPV\Common\Fields\Transaction as AbstractTransaction;

class Transaction extends AbstractTransaction
{
  
  public static function getOutputKey()
  {
    return 'Ds_Merchant_TransactionType';
  }
  
}