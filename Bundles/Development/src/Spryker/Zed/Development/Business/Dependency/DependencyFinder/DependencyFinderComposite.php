<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Development\Business\Dependency\DependencyFinder;

use Spryker\Zed\Development\Business\Dependency\DependencyContainer\DependencyContainerInterface;

class DependencyFinderComposite implements DependencyFinderInterface
{
    /**
     * @var \Spryker\Zed\Development\Business\Dependency\DependencyFinder\DependencyFinderInterface[]
     */
    protected $dependencyFinder;

    /**
     * @param \Spryker\Zed\Development\Business\Dependency\DependencyFinder\DependencyFinderInterface[] $dependencyFinder
     */
    public function __construct(array $dependencyFinder)
    {
        $this->dependencyFinder = $dependencyFinder;
    }

    /**
     * @param string $module
     * @param \Spryker\Zed\Development\Business\Dependency\DependencyContainer\DependencyContainerInterface $dependencyContainer
     *
     * @return \Spryker\Zed\Development\Business\Dependency\DependencyContainer\DependencyContainerInterface
     */
    public function findDependencies(string $module, DependencyContainerInterface $dependencyContainer): DependencyContainerInterface
    {
        foreach ($this->dependencyFinder as $dependencyFinder) {
            $dependencyContainer = $dependencyFinder->findDependencies($module, $dependencyContainer);
        }

        return $dependencyContainer;
    }
}
