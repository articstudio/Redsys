<?php

namespace Articstudio\Redsys\TPV\WebService;

use Articstudio\Redsys\TPV\Common\TPV\TPV as AbstractTPV;
use Articstudio\Redsys\TPV\Webservice\Contracts\TPV AS TPVContract;
use Articstudio\Redsys\TPV\WebService\Request\Request;
use Curl\Curl;
use DOMDocument;
use DOMElement;

class TPV extends AbstractTPV implements TPVContract
{
  
  private $request_xml;
  private $curl;
  
  public function call()
  {
    $this->makeRequestXML()->makeCall();
  }
  
  private function makeRequestXML()
  {
    $dom = new DOMDocument();
    
    $dom_data = $this->makeRequestDataXML($dom);
    $dom_version = $this->makeRequestVersionXML();
    $dom_signature = $this->makeRequestSignatureXML($dom->saveXML($dom_data));
    
    $dom_root = $dom->createElement('REQUEST');
    $dom_root->appendChild($dom_data);
    $dom_root->appendChild($dom_version);
    $dom_root->appendChild($dom_signature);
    $dom->appendChild($dom_root);
    $this->request_xml = $dom->saveXML();
    return $this;
  }
  
  private function makeRequestDataXML($dom)
  {
    $data = $dom->createElement('DATOSENTRADA');
    $fields = $this->getRequest()->getFields();
    foreach ($fields as $field)
    {
      $data->appendChild(new DOMElement($field->getOutputKey(), $field->getOutputValue()));
    }
    return $data;
  }
  
  private function makeRequestVersionXML()
  {
    return new DOMElement('DS_SIGNATUREVERSION', $this->getSignature()->getVersion());
  }
  
  private function makeRequestSignatureXML($data)
  {
    return new DOMElement('DS_SIGNATURE', $this->getSignature()->makeDataSignature((string)$this->getRequest()->getOrder()->getOutputValue(), $data));
  }
  
  private function makeCall()
  {
    $options = [];
    $wsdl = $this->getEnvironment()->getURL() . '?wsdl';
    $xml = $this->request_xml;
    var_dump($wsdl);
    var_dump($xml);
    $sc = new Client\SerClsWSEntradaService($options, $wsdl);
    $action = new Client\trataPeticion($xml);
    $response = $sc->trataPeticion($action);
    $xml_response = $response->getTrataPeticionReturn();
    var_dump($xml_response);
    
    /*$this->curl = new Curl;
    $this->curl->setOpt(CURLOPT_HEADER, false);
    $this->curl->setHeader('Content-Type', 'application/x-www-form-urlencoded');
    $this->curl->setHeader('Connection', 'keep-alive');
    $this->curl->setHeader('Cache-Control', 'no-cache');
    $this->curl->setOpt(CURLOPT_FOLLOWLOCATION, true);
    $this->curl->setOpt(CURLOPT_AUTOREFERER, true);
    $cookie = tempnam(sys_get_temp_dir(), microtime(true));
    $this->curl->setOpt(CURLOPT_COOKIEJAR, $cookie);
    $this->curl->setOpt(CURLOPT_COOKIEFILE, $cookie);
    $this->curl->setOpt(CURLOPT_COOKIESESSION, false);
    $this->curl->setOpt(CURLOPT_RETURNTRANSFER, true);
    $this->curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
    $this->curl->setOpt(CURLOPT_SSL_VERIFYHOST, 2);
    $this->curl->setOpt(CURLOPT_MAXREDIRS, 10);
    //$this->curl->setDefaultXmlDecoder();
    var_dump($this->getEnvironment()->getURL());
    $response = $this->curl->post($this->getEnvironment()->getURL(), ['entrada'=>$this->request_xml], true);
    var_dump($this->curl->curlError);
    var_dump($this->curl->curlErrorCode);
    var_dump($this->curl->curlErrorMessage);
    var_dump($this->curl->requestHeaders);
    var_dump($this->curl->httpStatusCode);
    var_dump($this->curl->responseHeaders);
    var_dump($this->curl->rawResponse);
    var_dump($this->curl->response);
    var_dump($response);*/
  }

  public static function createRequest($fields = [])
  {
    return new Request($fields);
  }
  
  public function processResponse($response)
  {
    
  }

}
