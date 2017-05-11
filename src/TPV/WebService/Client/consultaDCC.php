<?php

namespace Articstudio\Redsys\TPV\WebService\Client;

class consultaDCC
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
     * @return \Articstudio\Redsys\TPV\WebService\Client\consultaDCC
     */
    public function setDatoEntrada($datoEntrada)
    {
      $this->datoEntrada = $datoEntrada;
      return $this;
    }

}
