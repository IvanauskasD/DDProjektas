<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerZ6qjkz4\srcDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerZ6qjkz4/srcDevDebugProjectContainer.php') {
    touch(__DIR__.'/ContainerZ6qjkz4.legacy');

    return;
}

if (!\class_exists(srcDevDebugProjectContainer::class, false)) {
    \class_alias(\ContainerZ6qjkz4\srcDevDebugProjectContainer::class, srcDevDebugProjectContainer::class, false);
}

return new \ContainerZ6qjkz4\srcDevDebugProjectContainer(array(
    'container.build_hash' => 'Z6qjkz4',
    'container.build_id' => '54284cc1',
    'container.build_time' => 1524519452,
), __DIR__.\DIRECTORY_SEPARATOR.'ContainerZ6qjkz4');
