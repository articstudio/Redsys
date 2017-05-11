<?php

namespace Articstudio\Redsys\TPV\Common\Request;

use Articstudio\Redsys\TPV\Common\Contracts\Field as FieldContract;
use Articstudio\Redsys\TPV\Common\Fields\Order;
use Articstudio\Redsys\TPV\Common\Contracts\Request as RequestContract;
use Traversable;

abstract class Request implements RequestContract
{

  private $fields = [];

  public function __construct($fields = [])
  {
    if (is_array($fields) || $fields instanceof Traversable)
    {
      foreach ($fields as $field)
      {
        if ($field instanceof FieldContract)
        {
          $this->addField($field);
        }
      }
    }
    else
    {
      throw new InvalidArgumentException('Expected an Array or Traversable object');
    }
  }

  public function addField(FieldContract $field)
  {
    $this->fields[$field->getKey()] = $field;
  }

  public function getField($key)
  {
    return isset($this->fields[$key]) ? $this->fields[$key] : null;
  }

  public function existField($key)
  {
    return isset($this->fields[$key]);
  }

  public function validField($key)
  {
    if ($this->existField($key))
    {
      $field = $this->getField($key);
      return $field->isValid();
    }
    return false;
  }

  public function getFields()
  {
    return $this->fields;
  }
  
  public function getFieldsOutputValues()
  {
    $return = [];
    foreach ($this->fields as $k => $field)
    {
      $return[$k] = $field->getOutputValue();
    }
    return $return;
  }
  
  public function getFieldsValues()
  {
    $return = [];
    foreach ($this->fields as $k => $field)
    {
      $return[$k] = $field->getValue();
    }
    return $return;
  }
  
  public function getOrder()
  {
    return $this->getField(Order::getKey());
  }

}
