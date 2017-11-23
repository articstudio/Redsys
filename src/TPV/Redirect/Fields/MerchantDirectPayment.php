<?php
namespace Articstudio\Redsys\TPV\Redirect\Fields;

use Articstudio\Redsys\TPV\Common\Fields\MerchantDirectPayment as AbstractMerchantDirectPayment;

class MerchantDirectPayment extends AbstractMerchantDirectPayment
{

    public static function getOutputKey()
    {
        return 'Ds_Merchant_DirectPayment';
    }
}
