<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Zed\SalesCheckoutConnector;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class SalesCheckoutConnectorDependencyProvider extends AbstractBundleDependencyProvider
{

    const FACADE_SALES = 'sales facade';

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container[self::FACADE_SALES] = function (Container $container) {
            return $container->getLocator()->sales()->facade();
        };

        return $container;
    }

}