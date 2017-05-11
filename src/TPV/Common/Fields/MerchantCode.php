<?php

namespace Articstudio\Redsys\TPV\Common\Fields;

use Articstudio\Redsys\TPV\Common\Fields\Field;

abstract class MerchantCode extends Field
{
  
  public static function getKey()
  {
    return 'merchant_code';
  }

  protected function normalize()
  {
    if ($this->isValid())
    {
      //$value = intval($this->value);
      //$this->normalized = str_pad($value, 9, '0', STR_PAD_LEFT);
      $this->normalized = intval($this->value);
    }
    else
    {
      $this->normalized = null;
    }
  }

  protected function validate()
  {
    $this->valid = is_numeric($this->value);
  }
  
}