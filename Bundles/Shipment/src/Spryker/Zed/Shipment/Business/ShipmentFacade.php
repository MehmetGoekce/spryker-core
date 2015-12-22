<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Zed\Shipment\Business;

use Generated\Shared\Transfer\ShipmentTransfer;
use Generated\Shared\Transfer\ShipmentMethodAvailabilityTransfer;
use Generated\Shared\Transfer\ShipmentCarrierTransfer;
use Generated\Shared\Transfer\ShipmentMethodTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method ShipmentBusinessFactory getFactory()
 */
class ShipmentFacade extends AbstractFacade
{

    /**
     * @param ShipmentCarrierTransfer $carrierTransfer
     *
     * @return ShipmentCarrierTransfer
     */
    public function createCarrier(ShipmentCarrierTransfer $carrierTransfer)
    {
        $carrierModel = $this->getFactory()
            ->createCarrier();

        return $carrierModel->create($carrierTransfer);
    }

    /**
     * @param ShipmentMethodTransfer $methodTransfer
     *
     * @return ShipmentCarrierTransfer
     */
    public function createMethod(ShipmentMethodTransfer $methodTransfer)
    {
        $methodModel = $this->getFactory()
            ->createMethod();

        return $methodModel->create($methodTransfer);
    }

    /**
     * @param ShipmentMethodAvailabilityTransfer $shipmentMethodAvailability
     *
     * @return ShipmentTransfer
     */
    public function getAvailableMethods(ShipmentMethodAvailabilityTransfer $shipmentMethodAvailability)
    {
        $methodModel = $this->getFactory()
            ->createMethod();

        return $methodModel->getAvailableMethods($shipmentMethodAvailability);
    }

    /**
     * @param $idMethod
     *
     * @return ShipmentMethodTransfer
     */
    public function getShipmentMethodTransferById($idMethod)
    {
        $methodModel = $this->getFactory()
            ->createMethod();

        return $methodModel->getShipmentMethodTransferById($idMethod);
    }

    /**
     * @param int $idMethod
     *
     * @return bool
     */
    public function hasMethod($idMethod)
    {
        $methodModel = $this->getFactory()
            ->createMethod();

        return $methodModel->hasMethod($idMethod);
    }

    /**
     * @param int $idMethod
     *
     * @return bool
     */
    public function deleteMethod($idMethod)
    {
        $methodModel = $this->getFactory()
            ->createMethod();

        return $methodModel->deleteMethod($idMethod);
    }

    /**
     * @param ShipmentMethodTransfer $methodTransfer
     *
     * @return ShipmentCarrierTransfer
     */
    public function updateMethod(ShipmentMethodTransfer $methodTransfer)
    {
        $methodModel = $this->getFactory()
            ->createMethod();

        return $methodModel->updateMethod($methodTransfer);
    }

}