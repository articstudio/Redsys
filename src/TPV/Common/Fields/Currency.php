<?php

namespace Articstudio\Redsys\TPV\Common\Fields;

use Articstudio\Redsys\TPV\Common\Fields\Field;

abstract class Currency extends Field
{

  const CODE_USD = 840;
  const CODE_GBP = 826;
  const CODE_EUR = 978;
  const CODE_JPY = 392;

  public static function getKey()
  {
    return 'currency';
  }

  protected function validate()
  {
    $value = intval($this->value);
    $this->valid = in_array($value, static::getCurrencies(), true);
  }

  public static function getCurrencies()
  {
    return [
      static::CODE_EUR,
      static::CODE_GBP,
      static::CODE_USD,
      static::CODE_JPY
    ];
  }

}
