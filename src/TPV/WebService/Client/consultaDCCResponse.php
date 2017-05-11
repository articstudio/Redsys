<?php

namespace Articstudio\Redsys\TPV\WebService\Client;

class consultaDCCResponse
{

    /**
     * @var string $consultaDCCReturn
     */
    protected $consultaDCCReturn = null;

    /**
     * @param string $consultaDCCReturn
     */
    public function __construct($consultaDCCReturn)
    {
      $this->consultaDCCReturn = $consultaDCCReturn;
    }

    /**
     * @return string
     */
    public function getConsultaDCCReturn()
    {
      return $this->consultaDCCReturn;
    }

    /**
     * @param string $consultaDCCReturn
     * @return \Articstudio\Redsys\TPV\WebService\Client\consultaDCCResponse
     */
    public function setConsultaDCCReturn($consultaDCCReturn)
    {
      $this->consultaDCCReturn = $consultaDCCReturn;
      return $this;
    }

}
