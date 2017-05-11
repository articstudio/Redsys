<?php

namespace Articstudio\Redsys\TPV\Common\Fields;

use Articstudio\Redsys\TPV\Common\Fields\Field;

abstract class CardExpire extends Field
{
  
  public static function getKey()
  {
    return 'card_expire';
  }

  protected function normalize()
  {
    if ($this->isValid())
    {
      if (is_array($this->value))
      {
        $this->normalized = str_pad(substr(strval($this->value['year']), -2), 2, '0', STR_PAD_LEFT);
        $this->normalized .= str_pad(substr(strval($this->value['month']), -2), 2, '0', STR_PAD_LEFT);
      }
      else
      {
        $value = intval($this->value);
        $this->normalized = str_pad($value, 4, '0', STR_PAD_LEFT);
      }
      
    }
    else
    {
      $this->normalized = null;
    }
  }

  protected function validate()
  {
    if (is_array($this->value))
    {
      $this->valid = (isset($this->value['year']) && is_numeric($this->value['year']) && isset($this->value['month']) && is_numeric($this->value['month']));
    }
    else
    {
      $this->valid = is_numeric($this->value);
    }
  }
  
}