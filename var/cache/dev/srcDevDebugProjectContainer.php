<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerBy5dpjr\srcDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerBy5dpjr/srcDevDebugProjectContainer.php') {
    touch(__DIR__.'/ContainerBy5dpjr.legacy');

    return;
}

if (!\class_exists(srcDevDebugProjectContainer::class, false)) {
    \class_alias(\ContainerBy5dpjr\srcDevDebugProjectContainer::class, srcDevDebugProjectContainer::class, false);
}

return new \ContainerBy5dpjr\srcDevDebugProjectContainer(array(
    'container.build_hash' => 'By5dpjr',
    'container.build_id' => '86479fc8',
    'container.build_time' => 1524489238,
), __DIR__.\DIRECTORY_SEPARATOR.'ContainerBy5dpjr');
