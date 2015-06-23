<?php

namespace SprykerFeature\Yves\Cart\Communication\Controller;

use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use SprykerFeature\Yves\Cart\CartDependencyContainer;
use SprykerFeature\Yves\Cart\Communication\Plugin\CartControllerProvider;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method CartDependencyContainer getDependencyContainer()
 */
class CouponController extends AbstractController
{

    /**
     * @param string $couponCode
     *
     * @return RedirectResponse
     */
    public function addAction($couponCode)
    {
        $cartClient = $this->getDependencyContainer()->createCartClient();
        $cart = $cartClient->addCoupon($couponCode);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

    /**
     * @param string $couponCode
     *
     * @return RedirectResponse
     */
    public function removeAction($couponCode)
    {
        $cartClient = $this->getDependencyContainer()->createCartClient();
        $cart = $cartClient->removeCoupon($couponCode);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

    /**
     * @return RedirectResponse
     */
    public function clearAction()
    {
        $cartClient = $this->getDependencyContainer()->createCartClient();
        $cart = $cartClient->clearCoupons();

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

}
