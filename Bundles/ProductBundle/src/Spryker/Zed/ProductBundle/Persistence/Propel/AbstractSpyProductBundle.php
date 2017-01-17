<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductBundle\Persistence\Propel;

use Orm\Zed\ProductBundle\Persistence\Base\SpyProductBundle as BaseSpyProductBundle;
use Orm\Zed\ProductBundle\Persistence\SpyProductBundleQuery;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Skeleton subclass for representing a row from the 'spy_product_bundle' table.
 *
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements. This class will only be generated as
 * long as it does not already exist in the output directory.
 */
abstract class AbstractSpyProductBundle extends BaseSpyProductBundle
{

    /**
     * @param  ConnectionInterface $con
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return bool
     */
    public function preSave(ConnectionInterface $con = null)
    {
        $numberOfBundlesUsing = SpyProductBundleQuery::create()
            ->filterByFkProduct($this->fk_bundled_product)
            ->_or()
            ->filterByFkBundledProduct($this->fk_product)
            ->count();

        if ($numberOfBundlesUsing > 0) {
            throw new PropelException('Cannot assign bundle product or use bundled product as a bundle.');
        }

        return true;
    }
}
