<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\PriceProductStorage;

use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Spryker\Client\PriceProductStorage\PriceProductStorageFactory getFactory()
 */
class PriceProductStorageClient extends AbstractClient implements PriceProductStorageClientInterface
{
    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param int $idProductAbstract
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer[]
     */
    public function getPriceProductAbstractTransfers(int $idProductAbstract): array
    {
        return $this->getFactory()
            ->createPriceAbstractStorageReader()
            ->findPriceProductAbstractTransfers($idProductAbstract);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param int $idProductConcrete
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer[]
     */
    public function getPriceProductConcreteTransfers(int $idProductConcrete): array
    {
        return $this->getFactory()
            ->createPriceConcreteStorageReader()
            ->findPriceProductConcreteTransfers($idProductConcrete);
    }
}
