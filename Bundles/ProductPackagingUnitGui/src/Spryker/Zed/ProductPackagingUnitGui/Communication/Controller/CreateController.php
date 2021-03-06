<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductPackagingUnitGui\Communication\Controller;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Spryker\Zed\ProductPackagingUnitGui\Communication\ProductPackagingUnitGuiCommunicationFactory getFactory()
 */
class CreateController extends AbstractProductPackagingUnitGuiController
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $availableLocales = $this->getFactory()->getLocaleFacade()->getLocaleCollection();
        $productPackagingUnitTypeDataProvider = $this->getFactory()
            ->createProductPackagingUnitTypeDataProvider();

        $productPackagingUnitTypeForm = $this->getFactory()
            ->getProductPackagingUnitTypeForm(
                $productPackagingUnitTypeDataProvider->getData(),
                $productPackagingUnitTypeDataProvider->getOptions()
            )
            ->handleRequest($request);

        if ($productPackagingUnitTypeForm->isSubmitted() && $productPackagingUnitTypeForm->isValid()) {
            return $this->createProductPackagingUnitType($request, $productPackagingUnitTypeForm);
        }

        return $this->viewResponse([
            'availableLocales' => $availableLocales,
            'productPackagingUnitTypeForm' => $productPackagingUnitTypeForm->createView(),
        ]);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Symfony\Component\Form\FormInterface $productPackagingUnitTypeForm
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    protected function createProductPackagingUnitType(Request $request, FormInterface $productPackagingUnitTypeForm)
    {
        $redirectUrl = $this->getRequestRedirectUrl($request);
        $productPackagingUnitTypeTransfer = $productPackagingUnitTypeForm->getData();
        $productPackagingUnitTypeTransfer = $this->getFactory()
            ->getProductPackagingUnitFacade()
            ->createProductPackagingUnitType($productPackagingUnitTypeTransfer);

        if (!$productPackagingUnitTypeTransfer->getIdProductPackagingUnitType()) {
            $this->addErrorMessage(sprintf(
                static::MESSAGE_ERROR_PACKAGING_UNIT_TYPE_CREATE,
                $productPackagingUnitTypeTransfer->getName()
            ));

            return $this->viewResponse([
                'form' => $productPackagingUnitTypeForm->createView(),
            ]);
        }

        $this->addSuccessMessage(sprintf(
            static::MESSAGE_SUCCESS_PACKAGING_UNIT_TYPE_CREATE,
            $productPackagingUnitTypeTransfer->getName()
        ));

        return $this->redirectResponse($redirectUrl);
    }
}
