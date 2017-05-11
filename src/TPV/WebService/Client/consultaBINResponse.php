<?php

namespace Articstudio\Redsys\TPV\WebService\Client;

class consultaBINResponse
{

    /**
     * @var string $consultaBINReturn
     */
    protected $consultaBINReturn = null;

    /**
     * @param string $consultaBINReturn
     */
    public function __construct($consultaBINReturn)
    {
      $this->consultaBINReturn = $consultaBINReturn;
    }

    /**
     * @return string
     */
    public function getConsultaBINReturn()
    {
      return $this->consultaBINReturn;
    }

    /**
     * @param string $consultaBINReturn
     * @return \Articstudio\Redsys\TPV\WebService\Client\consultaBINResponse
     */
    public function setConsultaBINReturn($consultaBINReturn)
    {
      $this->consultaBINReturn = $consultaBINReturn;
      return $this;
    }

}
