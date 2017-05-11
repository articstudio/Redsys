<?php

namespace Articstudio\Redsys\TPV\WebService\Client;

class trataPeticion
{

  /**
   * @var string $datoEntrada
   */
  protected $datoEntrada = null;

  /**
   * @param string $datoEntrada
   */
  public function __construct($datoEntrada)
  {
    $this->datoEntrada = $datoEntrada;
  }

  /**
   * @return string
   */
  public function getDatoEntrada()
  {
    return $this->datoEntrada;
  }

  /**
   * @param string $datoEntrada
   * @return \Articstudio\Redsys\TPV\WebService\Client\trataPeticion
   */
  public function setDatoEntrada($datoEntrada)
  {
    $this->datoEntrada = $datoEntrada;
    return $this;
  }

}
