<?php

namespace Articstudio\Redsys\TPV\Common\Contracts;

use Articstudio\Redsys\TPV\Common\Contracts\Field as FieldContract;

interface Request
{
  
  public function __construct($fields = []);
  public function addField(FieldContract $field);
  public function getField($key);
  public function existField($key);
  public function validField($key);
  public function getFields();
  public function getOrder();
  
}