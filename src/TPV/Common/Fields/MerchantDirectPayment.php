<?php
namespace Articstudio\Redsys\TPV\Common\Fields;

use Articstudio\Redsys\TPV\Common\Fields\Field;

abstract class MerchantDirectPayment extends Field
{

    const VALUE_TRUE = 'true';
    const VALUE_FALSE = 'false';

    public static function getKey
    ()
    {
        return 'merchant_direct_payment';
    }

    protected function normalize(
    )
    {
        if ($this->
                isValid()) {
            $this->normalized = $this->value;
        } else {
            $this->normalized = null;
        }
    }

    protected function validate()
    {
        $this->valid = (is_string($this->value) && ($this->value === self::VALUE_TRUE || $this->value === self::VALUE_FALSE));
    }
}
