<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'maker.auto_command.make_voter' shared service.

include_once $this->targetDirs[3].'/vendor/symfony/maker-bundle/src/MakerInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/maker-bundle/src/Maker/AbstractMaker.php';
include_once $this->targetDirs[3].'/vendor/symfony/maker-bundle/src/Maker/MakeVoter.php';
include_once $this->targetDirs[3].'/vendor/symfony/console/Command/Command.php';
include_once $this->targetDirs[3].'/vendor/symfony/maker-bundle/src/Command/MakerCommand.php';

$this->services['maker.auto_command.make_voter'] = $instance = new \Symfony\Bundle\MakerBundle\Command\MakerCommand(new \Symfony\Bundle\MakerBundle\Maker\MakeVoter(), ${($_ = isset($this->services['maker.file_manager']) ? $this->services['maker.file_manager'] : $this->load(__DIR__.'/getMaker_FileManagerService.php')) && false ?: '_'});

$instance->setName('make:voter');

return $instance;
