<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerIujofer\srcDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerIujofer/srcDevDebugProjectContainer.php') {
    touch(__DIR__.'/ContainerIujofer.legacy');

    return;
}

if (!\class_exists(srcDevDebugProjectContainer::class, false)) {
    \class_alias(\ContainerIujofer\srcDevDebugProjectContainer::class, srcDevDebugProjectContainer::class, false);
}

return new \ContainerIujofer\srcDevDebugProjectContainer(array(
    'container.build_hash' => 'Iujofer',
    'container.build_id' => '2009a9c6',
    'container.build_time' => 1525440883,
), __DIR__.\DIRECTORY_SEPARATOR.'ContainerIujofer');
