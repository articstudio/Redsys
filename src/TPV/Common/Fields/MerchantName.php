<?php

namespace Articstudio\Redsys\TPV\Common\Fields;

use Articstudio\Redsys\TPV\Common\Fields\Field;

abstract class MerchantName extends Field
{
  
  public static function getKey()
  {
    return 'merchant_name';
  }

  protected function normalize()
  {
    if ($this->isValid())
    {
      $this->normalized = $this->value;
    }
    else
    {
      $this->normalized = null;
    }
  }

  protected function validate()
  {
    $this->valid = (is_string($this->value) && !empty($this->value));
  }
  
}