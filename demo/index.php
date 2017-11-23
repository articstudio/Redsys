<?php
/* VENDOR */
require_once dirname(__DIR__) . '/vendor/autoload.php';

/* HELPERS */
require_once __DIR__ . '/helpers.php';

$action = filter_input(INPUT_POST, 'action', FILTER_DEFAULT);

?>
<form action="" method="post">
    <input type="hidden" name="action" value="config">
    <fieldset>
        <legend>Configuration</legend>
        <?php
        echo_form_field('Merchant Code', \Articstudio\Redsys\TPV\Common\Fields\MerchantCode::getKey(), true);
        echo_form_field('Merchant Secret', 'secret_key', true);
        echo_form_field('Terminal', \Articstudio\Redsys\TPV\Common\Fields\Terminal::getKey(), true, 1);
        echo_form_field('Order', \Articstudio\Redsys\TPV\Common\Fields\Order::getKey(), true);
        echo_form_field('Amount', \Articstudio\Redsys\TPV\Common\Fields\Amount::getKey(), true);
        echo_form_field('Currency', \Articstudio\Redsys\TPV\Common\Fields\Currency::getKey(), true, \Articstudio\Redsys\TPV\Common\Fields\Currency::CODE_EUR);
        echo_form_field('Identifier', \Articstudio\Redsys\TPV\Common\Fields\MerchantIdentifier::getKey());
        echo_form_field('Direct Payment', \Articstudio\Redsys\TPV\Common\Fields\MerchantDirectPayment::getKey());

        ?>
        <p>
            <input type="submit" value="Submit">
        </p>
    </fieldset>

</form>
<?php
if ($action):

    try {
        $request = new Articstudio\Redsys\TPV\Redirect\Request\AuthorizationRequest;
        $request->addField(new \Articstudio\Redsys\TPV\Redirect\Fields\MerchantCode(
            filter_input(INPUT_POST, \Articstudio\Redsys\TPV\Redirect\Fields\MerchantCode::getKey(), FILTER_DEFAULT)
        ));
        $request->addField(new Articstudio\Redsys\TPV\Redirect\Fields\Order(
            filter_input(INPUT_POST, \Articstudio\Redsys\TPV\Redirect\Fields\Order::getKey(), FILTER_DEFAULT)
        ));
        $request->addField(new \Articstudio\Redsys\TPV\Redirect\Fields\Amount(
            filter_input(INPUT_POST, \Articstudio\Redsys\TPV\Redirect\Fields\Amount::getKey(), FILTER_DEFAULT)
        ));
        $request->addField(new Articstudio\Redsys\TPV\Redirect\Fields\Currency(
            filter_input(INPUT_POST, \Articstudio\Redsys\TPV\Redirect\Fields\Currency::getKey(), FILTER_DEFAULT)
        ));
        $request->addField(new \Articstudio\Redsys\TPV\Redirect\Fields\Terminal(
            filter_input(INPUT_POST, \Articstudio\Redsys\TPV\Redirect\Fields\Terminal::getKey(), FILTER_DEFAULT)
        ));

        $identifier = filter_input(INPUT_POST, \Articstudio\Redsys\TPV\Redirect\Fields\MerchantIdentifier::getKey(), FILTER_DEFAULT);
        if ($identifier) {
            $request->addField(new \Articstudio\Redsys\TPV\Redirect\Fields\MerchantIdentifier($identifier));
            $direct_payment = filter_input(INPUT_POST, \Articstudio\Redsys\TPV\Redirect\Fields\MerchantDirectPayment::getKey(), FILTER_DEFAULT);
            if ($direct_payment) {
                $request->addField(new \Articstudio\Redsys\TPV\Redirect\Fields\MerchantDirectPayment($direct_payment));
            }
        }

        $signature = new Articstudio\Redsys\TPV\Redirect\Signature\Signature_HMAC_SHA256;
        $signature->setSecret(
            filter_input(INPUT_POST, 'secret_key', FILTER_DEFAULT)
        );

        $environment = new Articstudio\Redsys\TPV\Redirect\Environment\TestEnvironment();

        $tpv = new Articstudio\Redsys\TPV\Redirect\TPV($environment, $signature, $request);

        $tpv->prepareForm()->displayForm(true, 'redsys-form', 'redsys-form', 'TEST', '', '_blank');

        echo '<pre>' . print_r($tpv->getForm(), true) . '</pre>';
        echo '<pre>' . print_r($tpv->getParameters(), true) . '</pre>';
    } catch (Exception $ex) {
        echo '<h4>' . $ex->getMessage() . '</h4>';
    }

    endif;

