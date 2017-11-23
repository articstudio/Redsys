<?php
namespace Articstudio\Redsys\TPV\Common\Fields;

use Articstudio\Redsys\TPV\Common\Fields\Field;

abstract class MerchantIdentifier extends Field
{

    const REQUIRED = 'REQUIRED';

    public static function getKey()
    {
        return 'merchant_identifier';
    }

    protected function normalize()
    {
        if ($this->isValid()) {
            $this->normalized = $this->value;
        } else {
            $this->normalized = null;
        }
    }

    protected function validate()
    {
        $this->valid = (is_string($this->value) && !empty($this->value));
    }
}
