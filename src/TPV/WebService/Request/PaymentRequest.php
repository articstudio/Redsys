<?php

namespace Articstudio\Redsys\TPV\WebService\Request;

use Articstudio\Redsys\TPV\WebService\Request\Request;
use Articstudio\Redsys\TPV\WebService\Fields\Transaction;

class PaymentRequest extends Request
{

  public function __construct($fields = [])
  {
    parent::__construct($fields);
    $this->addField(new Transaction(Transaction::TYPE_PAYMENT));
  }

}
