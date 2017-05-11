<?php

namespace Articstudio\Redsys\TPV\Redirect\Request;

use Articstudio\Redsys\TPV\Redirect\Request\Request;
use Articstudio\Redsys\TPV\Redirect\Fields\Transaction;

class AuthorizationRequest extends Request
{

  public function __construct($fields = [])
  {
    parent::__construct($fields);
    $this->addField(new Transaction(Transaction::TYPE_AUTHORIZATION));
  }

}
