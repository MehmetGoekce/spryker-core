<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductSearchConfigStorage;

use Spryker\Zed\Kernel\AbstractBundleConfig;

class ProductSearchConfigStorageConfig extends AbstractBundleConfig
{
    /**
     * @return bool
     */
    public function isSendingToQueue(): bool
    {
        return true;
    }

    /**
     * @return null|string
     */
    public function getProductSearchConfigSynchronizationPoolName(): ?string
    {
        return null;
    }
}
