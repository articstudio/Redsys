<?php

namespace Articstudio\Redsys\TPV\Redirect\Fields;

use Articstudio\Redsys\TPV\Common\Fields\UrlOk as AbstractUrlOk;

class UrlOk extends AbstractUrlOk
{
  
  public static function getOutputKey()
  {
    return 'Ds_Merchant_UrlOK';
  }
  
}