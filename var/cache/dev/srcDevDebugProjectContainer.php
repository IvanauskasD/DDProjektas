<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerDqgtlqn\srcDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerDqgtlqn/srcDevDebugProjectContainer.php') {
    touch(__DIR__.'/ContainerDqgtlqn.legacy');

    return;
}

if (!\class_exists(srcDevDebugProjectContainer::class, false)) {
    \class_alias(\ContainerDqgtlqn\srcDevDebugProjectContainer::class, srcDevDebugProjectContainer::class, false);
}

return new \ContainerDqgtlqn\srcDevDebugProjectContainer(array(
    'container.build_hash' => 'Dqgtlqn',
    'container.build_id' => 'f8406001',
    'container.build_time' => 1524425263,
), __DIR__.\DIRECTORY_SEPARATOR.'ContainerDqgtlqn');
