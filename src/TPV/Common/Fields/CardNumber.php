<?php

namespace Articstudio\Redsys\TPV\Common\Fields;

use Articstudio\Redsys\TPV\Common\Fields\Field;

abstract class CardNumber extends Field
{
  
  public static function getKey()
  {
    return 'card_number';
  }

  protected function normalize()
  {
    if ($this->isValid())
    {
      $value = str_replace(' ', '', $this->value);
      $this->normalized = str_pad($value, 12, '0', STR_PAD_LEFT);
    }
    else
    {
      $this->normalized = null;
    }
  }

  protected function validate()
  {
    $this->valid = is_string($this->value);
  }
  
}