<?php

namespace Articstudio\Redsys\TPV\Common\Signature;

use Articstudio\Redsys\TPV\Common\Signature\Signature;

abstract class Signature_HMAC_SHA256 extends Signature
{

  protected $version = 'HMAC_SHA256_V1';

  protected function mac_256($data, $key)
  {
    return hash_hmac('sha256', $data, $key, true);
  }

  protected function encryp_t3DES($message, $key)
  {
    $bytes = array(0, 0, 0, 0, 0, 0, 0, 0);
    $iv = implode(array_map('chr', $bytes));
    return mcrypt_encrypt(MCRYPT_3DES, $key, $message, MCRYPT_MODE_CBC, $iv);
  }

  protected function base64_url_encode($input)
  {
    return strtr(base64_encode($input), '+/', '-_');
  }

  protected function encodeBase64($data)
  {
    return base64_encode($data);
  }

  protected function base64_url_decode($input)
  {
    return base64_decode(strtr($input, '-_', '+/'));
  }

  protected function decodeBase64($data)
  {
    return base64_decode($data);
  }

}
