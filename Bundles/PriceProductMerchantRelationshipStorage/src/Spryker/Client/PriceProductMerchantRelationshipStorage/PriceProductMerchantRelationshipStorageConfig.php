<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\PriceProductMerchantRelationshipStorage;

use Spryker\Client\Kernel\AbstractBundleConfig;

/**
 * @method \Spryker\Shared\PriceProductMerchantRelationshipStorage\PriceProductMerchantRelationshipStorageConfig getSharedConfig()
 */
class PriceProductMerchantRelationshipStorageConfig extends AbstractBundleConfig
{
    /**
     * @return string
     */
    public function getPriceDimensionMerchantRelationship()
    {
        return $this->getSharedConfig()->getPriceDimensionMerchantRelationship();
    }
}
