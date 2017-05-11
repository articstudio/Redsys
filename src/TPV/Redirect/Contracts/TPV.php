<?php

namespace Articstudio\Redsys\TPV\Redirect\Contracts;

use Articstudio\Redsys\TPV\Common\Contracts\TPV as TPVContract;

interface TPV extends TPVContract
{
  public function prepareForm();

  public function getForm();

  public function displayForm($print, $id, $name, $text, $cssclass);
}
