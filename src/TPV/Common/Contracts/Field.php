<?php

namespace Articstudio\Redsys\TPV\Common\Contracts;

interface Field
{
  
  public static function getKey();
  public static function getOutputKey();
  public function setValue($value);
  public function getValue();
  public function getOutputValue();
  public function isValid();
  
}