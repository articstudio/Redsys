<?php

namespace Articstudio\Redsys\TPV\Common\Signature;

use Articstudio\Redsys\TPV\Common\Signature\Signature;

abstract class Signature_HMAC_SHA256 extends Signature {

    protected $version = 'HMAC_SHA256_V1';

    protected function mac_256($data, $key) {
        return hash_hmac('sha256', $data, $key, true);
    }

    protected function encrypt_3DES($message, $key) {
        $l = ceil(strlen($message) / 8) * 8;
        $data = $message . str_repeat("\0", $l - strlen($message));
        $method = 'des-ede3-cbc';
        $options = OPENSSL_RAW_DATA;
        $iv = implode(array_map('chr', array(0, 0, 0, 0, 0, 0, 0, 0)));

        return substr(openssl_encrypt($data, $method, $key, $options, $iv), 0, $l);
    }

    protected function base64_url_encode($input) {
        return strtr(base64_encode($input), '+/', '-_');
    }

    protected function encodeBase64($data) {
        return base64_encode($data);
    }

    protected function base64_url_decode($input) {
        return base64_decode(strtr($input, '-_', '+/'));
    }

    protected function decodeBase64($data) {
        return base64_decode($data);
    }

}
