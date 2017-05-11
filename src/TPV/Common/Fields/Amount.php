<?php

namespace Articstudio\Redsys\TPV\Common\Fields;

use Articstudio\Redsys\TPV\Common\Fields\Field;

abstract class Amount extends Field
{

  public static function getKey()
  {
    return 'amount';
  }

  protected function normalize()
  {
    if ($this->isValid())
    {
      $value = $this->value;
      if (is_string($this->value))
      {
        $value = strpos($this->value, '.') === false ? intval($this->value) : floatval($this->value);
      }
      if (is_float($value))
      {
        $value = round($this->value, 2, PHP_ROUND_HALF_UP);
      }
      $value *= 100;
      //$this->normalized = str_pad($value, 12, '0', STR_PAD_LEFT);
      $this->normalized = $value;
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
