<?php

namespace Articstudio\Redsys\TPV\Common\Fields;

use Articstudio\Redsys\TPV\Common\Contracts\Field as FieldContract;
use InvalidArgumentException;

abstract class Field implements FieldContract
{
  
  protected $normalized = null;
  protected $value = null;
  protected $valid = false;

  public function __construct($value = null)
  {
    if (!is_null($value) && !$this->setValue($value))
    {
      throw new InvalidArgumentException('Invalid field value.');
    }
  }

  public function setValue($value)
  {
    $this->value = $value;
    $this->validate();
    return $this->isValid();
  }
  
  public function getValue()
  {
    return $this->value;
  }
  
  public function getOutputValue()
  {
    $this->normalize();
    return $this->normalized;
  }
  
  protected function normalize()
  {
    $this->normalized = $this->isValid() ? $this->value : null;
  }

  protected function validate()
  {
    $this->valid = true;
  }
  
  public function isValid()
  {
    return $this->valid;
  }

}