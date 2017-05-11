<?php

namespace Articstudio\Redsys\TPV\WebService\Client;

class trataPeticionResponse3DES
{

    /**
     * @var string $trataPeticionReturn
     */
    protected $trataPeticionReturn = null;

    /**
     * @param string $trataPeticionReturn
     */
    public function __construct($trataPeticionReturn)
    {
      $this->trataPeticionReturn = $trataPeticionReturn;
    }

    /**
     * @return string
     */
    public function getTrataPeticionReturn()
    {
      return $this->trataPeticionReturn;
    }

    /**
     * @param string $trataPeticionReturn
     * @return \Articstudio\Redsys\TPV\WebService\Client\trataPeticionResponse3DES
     */
    public function setTrataPeticionReturn($trataPeticionReturn)
    {
      $this->trataPeticionReturn = $trataPeticionReturn;
      return $this;
    }

}
