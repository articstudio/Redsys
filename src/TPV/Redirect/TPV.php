<?php
namespace Articstudio\Redsys\TPV\Redirect;

use Articstudio\Redsys\TPV\Common\TPV\TPV as AbstractTPV;
use Articstudio\Redsys\TPV\Redirect\Contracts\TPV AS TPVContract;
use Articstudio\Redsys\TPV\Redirect\Request\Request;

class TPV extends AbstractTPV implements TPVContract
{

    private $parameters;
    private $parameters_encoded;
    private $signature_version;
    private $signature;
    private $form_params;
    private $form_url;
    private $response;
    private $response_decoded_params;

    public function prepareForm()
    {
        $this->makeParameters()
            ->encodeParameters()
            ->makeVersion()
            ->makeSignature()
            ->makeForm();
        return $this;
    }

    public function getForm()
    {
        return [
            'url' => $this->form_url,
            'params' => $this->form_params
        ];
    }

    public function displayForm($print = true, $id = 'redsys-form', $name = 'redsys-form', $text = 'CONTINUE', $cssclass = '', $target = '_self')
    {
        $form = "\n" . '<form id="' . $id . '" name="' . $name . '" action="' . $this->form_url . '" method="POST" target="' . $target . '">' . "\n";
        foreach ($this->form_params as $k => $v) {
            $form .= '<input type="hidden" name="' . $k . '" value="' . $v . '"/>' . "\n";
        }
        $form .= '<input type="submit" value="' . $text . '" class="' . $cssclass . '" />' . "\n";
        $form .= '</form>' . "\n";
        if ($print) {
            echo $form;
        }
        return $form;
    }

    private function makeForm()
    {
        $this->form_params = [
            'Ds_SignatureVersion' => $this->signature_version,
            'Ds_Signature' => $this->signature,
            'Ds_MerchantParameters' => $this->parameters_encoded
        ];
        $this->form_url = $this->getEnvironment()->getURL();
    }

    private function makeSignature()
    {
        $this->signature = $this->getSignature()->makeDataSignature((string) $this->getRequest()->getOrder()->getOutputValue(), $this->parameters_encoded);
        return $this;
    }

    private function makeVersion()
    {
        $this->signature_version = $this->getSignature()->getVersion();
        return $this;
    }

    private function encodeParameters()
    {
        $this->parameters_encoded = base64_encode(json_encode($this->parameters));
        return $this;
    }

    private function makeParameters()
    {
        $this->parameters = [];
        $fields = $this->getRequest()->getFields();
        foreach ($fields as $field) {
            $this->parameters[$field->getOutputKey()] = $field->getOutputValue();
        }
        return $this;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    public static function createRequest($fields = [])
    {
        return new Request($fields);
    }

    private function decodeResponseParameters($params)
    {
        $this->response_decoded_params = json_decode(base64_decode($params), true);
        return $this;
    }

    public function processResponse($response)
    {
        $this->response = $response;
        $tpv_version = (isset($response['Ds_SignatureVersion']) && !empty($response['Ds_SignatureVersion'])) ? $response['Ds_SignatureVersion'] : false;
        $tpv_params = (isset($response['Ds_MerchantParameters']) && !empty($response['Ds_MerchantParameters'])) ? $response['Ds_MerchantParameters'] : false;
        $tpv_signature_response = (isset($response['Ds_Signature']) && !empty($response['Ds_Signature'])) ? $response['Ds_Signature'] : false;
        if ($tpv_version && $tpv_params && $tpv_signature_response) {
            $valid = $this->getSignature()->checkDataSignature((string) $this->getRequest()->getOrder()->getOutputValue(), $tpv_params, $tpv_signature_response);
            if ($valid) {
                return $this->decodeResponseParameters($tpv_params)->response_decoded_params;
            }
        }
        return false;
    }
}
