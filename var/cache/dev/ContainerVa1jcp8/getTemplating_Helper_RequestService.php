<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'templating.helper.request' shared service.

include_once $this->targetDirs[3].'\\vendor\\symfony\\templating\\Helper\\HelperInterface.php';
include_once $this->targetDirs[3].'\\vendor\\symfony\\templating\\Helper\\Helper.php';
include_once $this->targetDirs[3].'\\vendor\\symfony\\framework-bundle\\Templating\\Helper\\RequestHelper.php';

return $this->services['templating.helper.request'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\RequestHelper(${($_ = isset($this->services['request_stack']) ? $this->services['request_stack'] : $this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack()) && false ?: '_'});
