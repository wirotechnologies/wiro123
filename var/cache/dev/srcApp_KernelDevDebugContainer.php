<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerA1Y9Vz1\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerA1Y9Vz1/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerA1Y9Vz1.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerA1Y9Vz1\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerA1Y9Vz1\srcApp_KernelDevDebugContainer(array(
    'container.build_hash' => 'A1Y9Vz1',
    'container.build_id' => '1c95a665',
    'container.build_time' => 1544472504,
), __DIR__.\DIRECTORY_SEPARATOR.'ContainerA1Y9Vz1');
