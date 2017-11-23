<?php
namespace Articstudio\Redsys\TPV\Redirect\Fields;

use Articstudio\Redsys\TPV\Common\Fields\MerchantIdentifier as AbstractMerchantIdentifier;

class MerchantIdentifier extends AbstractMerchantIdentifier
{

    public static function getOutputKey()
    {
        return 'Ds_Merchant_Identifier';
    }
}
