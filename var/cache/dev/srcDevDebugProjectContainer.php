<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerBn2eylb\srcDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerBn2eylb/srcDevDebugProjectContainer.php') {
    touch(__DIR__.'/ContainerBn2eylb.legacy');

    return;
}

if (!\class_exists(srcDevDebugProjectContainer::class, false)) {
    \class_alias(\ContainerBn2eylb\srcDevDebugProjectContainer::class, srcDevDebugProjectContainer::class, false);
}

return new \ContainerBn2eylb\srcDevDebugProjectContainer(array(
    'container.build_hash' => 'Bn2eylb',
    'container.build_id' => '843d7a6d',
    'container.build_time' => 1524060776,
), __DIR__.\DIRECTORY_SEPARATOR.'ContainerBn2eylb');
