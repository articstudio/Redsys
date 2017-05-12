<?php

namespace Articstudio\Redsys\TPV\Redirect\Signature;

use Articstudio\Redsys\TPV\Common\Signature\Signature_HMAC_SHA256 as AbstractSignature;

class Signature_HMAC_SHA256 extends AbstractSignature {

    public function makeDataSignature($order, $data) {
        $key = $this->base64_url_decode($this->getSecret());
        $key = $this->encrypt_3DES($order, $key);
        $signature = $this->mac_256($data, $key);
        $signature = $this->encodeBase64($signature);
        return $signature;
    }

    public function checkDataSignature($order, $data, $response_signature) {
        $key = $this->base64_url_decode($this->getSecret());
        $key = $this->encrypt_3DES($order, $key);
        $signature = $this->mac_256($data, $key);
        $signature = $this->base64_url_encode($signature);
        return ($signature === $response_signature);
    }

}
