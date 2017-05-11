<?php

namespace Articstudio\Redsys\TPV\Redirect\Fields;

use Articstudio\Redsys\TPV\Common\Fields\UrlKo as AbstractUrlKo;

class UrlKo extends AbstractUrlKo
{
  
  public static function getOutputKey()
  {
    return 'Ds_Merchant_UrlKO';
  }
  
}