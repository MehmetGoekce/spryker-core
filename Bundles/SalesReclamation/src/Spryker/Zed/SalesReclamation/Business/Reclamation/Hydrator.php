<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\SalesReclamation\Business\Reclamation;

use ArrayObject;
use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use Generated\Shared\Transfer\ReclamationItemTransfer;
use Generated\Shared\Transfer\ReclamationTransfer;
use Orm\Zed\SalesReclamation\Persistence\Map\SpySalesReclamationItemTableMap;
use Orm\Zed\SalesReclamation\Persistence\Map\SpySalesReclamationTableMap;
use Spryker\Zed\SalesReclamation\Dependency\Facade\SalesReclamationToSalesFacadeInterface;
use Spryker\Zed\SalesReclamation\Persistence\SalesReclamationQueryContainerInterface;

class Hydrator implements HydratorInterface
{
    /**
     * @var \Spryker\Zed\SalesReclamation\Persistence\SalesReclamationQueryContainerInterface
     */
    protected $queryContainer;

    /**
     * @var \Spryker\Zed\SalesReclamation\Dependency\Facade\SalesReclamationToSalesFacadeInterface
     */
    protected $salesFacade;

    /**
     * @param \Spryker\Zed\SalesReclamation\Persistence\SalesReclamationQueryContainerInterface $queryContainer
     * @param \Spryker\Zed\SalesReclamation\Dependency\Facade\SalesReclamationToSalesFacadeInterface $salesFacade
     */
    public function __construct(
        SalesReclamationQueryContainerInterface $queryContainer,
        SalesReclamationToSalesFacadeInterface $salesFacade
    ) {
        $this->queryContainer = $queryContainer;
        $this->salesFacade = $salesFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\ReclamationTransfer $reclamationTransfer
     *
     * @return \Generated\Shared\Transfer\ReclamationTransfer|null
     */
    public function hydrateByIdReclamation(ReclamationTransfer $reclamationTransfer): ?ReclamationTransfer
    {
        $reclamationTransfer->requireIdSalesReclamation();

        $spyReclamation = $this->queryContainer
            ->queryReclamations()
            ->findOneByIdSalesReclamation($reclamationTransfer->getIdSalesReclamation());

        if (!$spyReclamation) {
            return null;
        }

        $orderTransfer = $this->salesFacade->getOrderByIdSalesOrder($spyReclamation->getFkSalesOrder());
        $reclamationTransfer->setStatus($spyReclamation->getState());
        $reclamationTransfer->setOrder($orderTransfer);
        $reclamationTransfer->setCustomerReference($spyReclamation->getCustomerReference());
        $reclamationTransfer->setCustomerEmail($spyReclamation->getCustomerEmail());

        $createdOrders = new ArrayObject();
        foreach ($spyReclamation->getCreatedOrders() as $spyRelatedOrder) {
            $createdOrderTransfer = new OrderTransfer();
            $createdOrderTransfer->fromArray($spyRelatedOrder->toArray(), true);
            $createdOrders->append($createdOrderTransfer);
        }
        $reclamationTransfer->setCreatedOrders($createdOrders);

        /** @var \Generated\Shared\Transfer\ReclamationItemTransfer[]|\ArrayObject $reclamationItems */
        $reclamationItems = new ArrayObject();
        foreach ($spyReclamation->getItems() as $spyReclamationItem) {
            $reclamationItemTransfer = new ReclamationItemTransfer();
            $reclamationItemTransfer->setId($spyReclamationItem->getIdSalesReclamationItem());
            $reclamationItemTransfer->setStatus($spyReclamationItem->getState());
            $itemTransfer = $this->getOrderItemById($orderTransfer, $spyReclamationItem->getFkSalesOrderItem());
            $reclamationItemTransfer->setOrderItem($itemTransfer);

            $reclamationItems->append($reclamationItemTransfer);
        }

        $reclamationTransfer->setReclamationItems($reclamationItems);

        return $reclamationTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\OrderTransfer $orderTransfer
     *
     * @return \Generated\Shared\Transfer\ReclamationTransfer
     */
    public function hydrateByOrder(OrderTransfer $orderTransfer): ReclamationTransfer
    {
        $orderTransfer->requireItems();

        $reclamationTransfer = new ReclamationTransfer();

        $reclamationTransfer->setStatus(SpySalesReclamationTableMap::COL_STATE_OPEN);
        $reclamationTransfer->setOrder($orderTransfer);
        $reclamationTransfer->setCustomerReference($orderTransfer->getCustomerReference());
        $reclamationTransfer->setCustomerEmail($orderTransfer->getEmail());

        /** @var \Generated\Shared\Transfer\ReclamationItemTransfer[]|\ArrayObject $reclamationItems */
        $reclamationItems = new ArrayObject();
        foreach ($orderTransfer->getItems() as $itemTransfer) {
            $reclamationItemTransfer = new ReclamationItemTransfer();
            $reclamationItemTransfer->setStatus(SpySalesReclamationItemTableMap::COL_STATE_OPEN);
            $reclamationItemTransfer->setOrderItem($itemTransfer);

            $reclamationItems->append($reclamationItemTransfer);
        }

        $reclamationTransfer->setReclamationItems($reclamationItems);

        return $reclamationTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\OrderTransfer $orderTransfer
     * @param int $idSalesOrderItem
     *
     * @return \Generated\Shared\Transfer\ItemTransfer|null
     */
    protected function getOrderItemById(OrderTransfer $orderTransfer, int $idSalesOrderItem): ?ItemTransfer
    {
        foreach ($orderTransfer->getItems() as $item) {
            if ($item->getIdSalesOrderItem() === $idSalesOrderItem) {
                return $item;
            }
        }

        return null;
    }
}
