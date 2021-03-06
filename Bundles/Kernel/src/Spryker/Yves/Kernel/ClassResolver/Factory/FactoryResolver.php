<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Yves\Kernel\ClassResolver\Factory;

use Spryker\Yves\Kernel\ClassResolver\AbstractClassResolver;

class FactoryResolver extends AbstractClassResolver
{
    const CLASS_NAME_PATTERN = '\\%1$s\\Yves\\%2$s%3$s\\%2$sFactory';

    /**
     * @param object|string $callerClass
     *
     * @throws \Spryker\Yves\Kernel\ClassResolver\Factory\FactoryNotFoundException
     *
     * @return \Spryker\Yves\Kernel\AbstractFactory
     */
    public function resolve($callerClass)
    {
        $this->setCallerClass($callerClass);
        if ($this->canResolve()) {
            /** @var \Spryker\Yves\Kernel\AbstractFactory $class */
            $class = $this->getResolvedClassInstance();

            return $class;
        }

        throw new FactoryNotFoundException($this->getClassInfo());
    }

    /**
     * @return string
     */
    public function getClassPattern()
    {
        return sprintf(
            self::CLASS_NAME_PATTERN,
            self::KEY_NAMESPACE,
            self::KEY_BUNDLE,
            self::KEY_STORE
        );
    }
}
