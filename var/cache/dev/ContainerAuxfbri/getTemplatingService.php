<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'templating' shared service.

include_once $this->targetDirs[3].'/vendor/symfony/templating/EngineInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/templating/StreamingEngineInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/twig-bridge/TwigEngine.php';
include_once $this->targetDirs[3].'/vendor/symfony/framework-bundle/Templating/EngineInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/twig-bundle/TwigEngine.php';
include_once $this->targetDirs[3].'/vendor/symfony/templating/DelegatingEngine.php';
include_once $this->targetDirs[3].'/vendor/symfony/framework-bundle/Templating/DelegatingEngine.php';

$this->services['templating'] = $instance = new \Symfony\Bundle\FrameworkBundle\Templating\DelegatingEngine($this, array());

$instance->addEngine(new \Symfony\Bundle\TwigBundle\TwigEngine(${($_ = isset($this->services['twig']) ? $this->services['twig'] : $this->getTwigService()) && false ?: '_'}, ${($_ = isset($this->services['templating.name_parser']) ? $this->services['templating.name_parser'] : $this->services['templating.name_parser'] = new \Symfony\Bundle\FrameworkBundle\Templating\TemplateNameParser(${($_ = isset($this->services['kernel']) ? $this->services['kernel'] : $this->get('kernel')) && false ?: '_'})) && false ?: '_'}, ${($_ = isset($this->services['templating.locator']) ? $this->services['templating.locator'] : $this->getTemplating_LocatorService()) && false ?: '_'}));
$instance->addEngine(${($_ = isset($this->services['debug.templating.engine.php']) ? $this->services['debug.templating.engine.php'] : $this->load('getDebug_Templating_Engine_PhpService.php')) && false ?: '_'});

return $instance;