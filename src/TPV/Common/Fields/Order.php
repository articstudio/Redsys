<?php

namespace Articstudio\Redsys\TPV\Common\Fields;

use Articstudio\Redsys\TPV\Common\Fields\Field;

abstract class Order extends Field
{
  
  public static function getKey()
  {
    return 'order';
  }

  protected function normalize()
  {
    if ($this->isValid())
    {
      $value = strval($this->value);
      $this->normalized = str_pad($value, 12, '0', STR_PAD_LEFT);
    }
    else
    {
      $this->normalized = null;
    }
  }

  protected function validate()
  {
    $this->valid = (is_numeric($this->value) || is_string($this->value));
  }
  
}