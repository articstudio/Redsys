<?php

namespace Articstudio\Redsys\TPV\Common\Fields;

use Articstudio\Redsys\TPV\Common\Fields\Field;

abstract class Terminal extends Field
{
  
  public static function getKey()
  {
    return 'terminal';
  }

  protected function normalize()
  {
    if ($this->isValid())
    {
      //$value = intval($this->value);
      //$this->normalized = str_pad($value, 3, '0', STR_PAD_LEFT);
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