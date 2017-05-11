<?php

namespace Articstudio\Redsys\TPV\Common\Fields;

use Articstudio\Redsys\TPV\Common\Fields\Field;

abstract class Transaction extends Field
{
  
  const TYPE_AUTHORIZATION = 0;
  const TYPE_PREAUTHORIZATION = 1;
  const TYPE_PREAUTHORIZATION_CONFIRMATION = 2;
  const TYPE_AUTOMATIC_RETURN = 3;
  const TYPE_RECURRING = 5;
  const TYPE_SUCCESSIVE = 6;
  const TYPE_PREAUTHENTICATION = 7;
  const TYPE_PREAUTHENTICATION_CONFIRMATION = 8;
  const TYPE_PREAUTHENTICATION_CANCELLATION = 0;
  const TYPE_PAYMENT = 'A';
  const TYPE_AUTHORIZATION_DELAYED = 'O';
  const TYPE_AUTHORIZATION_DELAYED_CONFIRMATION = 'P';
  const TYPE_AUTHORIZATION_DELAYED_CANCELLATION = 'Q';
  const TYPE_FEE_DELAYED = 'R';
  const TYPE_FEE_DELAYED_SUCCESSIVE = 'S';
  
  public static function getKey()
  {
    return 'transaction';
  }

  protected function validate()
  {
    $this->valid = ((is_numeric($this->value) || is_string($this->value)) && in_array($this->value, static::getTransactions(), true));
  }

  public static function getTransactions()
  {
    return [
      static::TYPE_AUTHORIZATION,
      static::TYPE_PREAUTHORIZATION,
      static::TYPE_PREAUTHORIZATION_CONFIRMATION,
      static::TYPE_AUTOMATIC_RETURN,
      static::TYPE_RECURRING,
      static::TYPE_SUCCESSIVE,
      static::TYPE_PREAUTHENTICATION,
      static::TYPE_PREAUTHENTICATION_CONFIRMATION,
      static::TYPE_PREAUTHENTICATION_CANCELLATION,
      static::TYPE_PAYMENT,
      static::TYPE_AUTHORIZATION_DELAYED,
      static::TYPE_AUTHORIZATION_DELAYED_CONFIRMATION,
      static::TYPE_AUTHORIZATION_DELAYED_CANCELLATION,
      static::TYPE_FEE_DELAYED,
      static::TYPE_FEE_DELAYED_SUCCESSIVE
    ];
  }
  
}