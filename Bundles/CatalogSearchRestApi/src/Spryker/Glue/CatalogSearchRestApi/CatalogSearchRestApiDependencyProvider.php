<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\CatalogSearchRestApi;

use Spryker\Glue\CatalogSearchRestApi\Dependency\Client\CatalogSearchRestApiToCatalogClientBridge;
use Spryker\Glue\Kernel\AbstractBundleDependencyProvider;
use Spryker\Glue\Kernel\Container;
use Spryker\Shared\Kernel\Store;

class CatalogSearchRestApiDependencyProvider extends AbstractBundleDependencyProvider
{
    public const CLIENT_CATALOG = 'CLIENT_CATALOG';
    public const STORE = 'STORE';

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    public function provideDependencies(Container $container): Container
    {
        $container = $this->addCatalogClient($container);
        $container = $this->addStore($container);

        return $container;
    }

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    protected function addCatalogClient(Container $container): Container
    {
        $container[static::CLIENT_CATALOG] = function (Container $container) {
            return new CatalogSearchRestApiToCatalogClientBridge($container->getLocator()->catalog()->client());
        };

        return $container;
    }

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    protected function addStore(Container $container): Container
    {
        $container[static::STORE] = function () {
            return Store::getInstance();
        };

        return $container;
    }
}
