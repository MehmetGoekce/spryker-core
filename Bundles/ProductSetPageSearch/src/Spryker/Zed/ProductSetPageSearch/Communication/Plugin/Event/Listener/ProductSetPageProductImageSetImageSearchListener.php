<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductSetPageSearch\Communication\Plugin\Event\Listener;

use Spryker\Zed\Event\Dependency\Plugin\EventBulkHandlerInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\PropelOrm\Business\Transaction\DatabaseTransactionHandlerTrait;

/**
 * @method \Spryker\Zed\ProductSetPageSearch\Persistence\ProductSetPageSearchQueryContainerInterface getQueryContainer()
 * @method \Spryker\Zed\ProductSetPageSearch\Communication\ProductSetPageSearchCommunicationFactory getFactory()
 * @method \Spryker\Zed\ProductSetPageSearch\Business\ProductSetPageSearchFacadeInterface getFacade()
 */
class ProductSetPageProductImageSetImageSearchListener extends AbstractPlugin implements EventBulkHandlerInterface
{
    use DatabaseTransactionHandlerTrait;

    /**
     * @api
     *
     * @param \Generated\Shared\Transfer\EventEntityTransfer[] $eventTransfers
     * @param string $eventName
     *
     * @return void
     */
    public function handleBulk(array $eventTransfers, $eventName)
    {
        $this->preventTransaction();
        $productImageSetToProductImageIds = $this->getFactory()->getEventBehaviorFacade()->getEventTransferIds($eventTransfers);
        $productSetIds = $this->getQueryContainer()->queryProductSetIdsByProductImageSetToProductImageIds($productImageSetToProductImageIds)->find()->getData();

        $this->getFacade()->publish($productSetIds);
    }
}
