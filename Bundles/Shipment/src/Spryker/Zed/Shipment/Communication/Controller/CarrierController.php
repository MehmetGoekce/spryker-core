<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Zed\Shipment\Communication\Controller;

use Generated\Shared\Transfer\ShipmentCarrierTransfer;
use Spryker\Zed\Application\Communication\Controller\AbstractController;
use Spryker\Zed\Shipment\Business\ShipmentFacade;
use Spryker\Zed\Shipment\Communication\ShipmentCommunicationFactory;
use Symfony\Component\HttpFoundation\Response;

/**
 * @method ShipmentCommunicationFactory getFactory()
 * @method ShipmentFacade getFacade()
 */
class CarrierController extends AbstractController
{

    /**
     * @return Response
     */
    public function addAction()
    {
        $form = $this->getFactory()
            ->createCarrierForm();
        $form->handleRequest();

        if ($form->isValid()) {
            $data = $form->getData();
            $carrierTransfer = new ShipmentCarrierTransfer();
            $carrierTransfer->fromArray($data, true);
            $this->getFacade()
                ->createCarrier($carrierTransfer);

            return $this->redirectResponse('/shipment/');
        }

        return $this->viewResponse([
            'form' => $form->createView(),
        ]);
    }

}