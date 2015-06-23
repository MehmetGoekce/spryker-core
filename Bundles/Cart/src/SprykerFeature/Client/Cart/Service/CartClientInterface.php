<?php

namespace SprykerFeature\Client\Cart\Service;

use Generated\Shared\Cart\CartInterface;

interface CartClientInterface
{

    /**
     * @return CartInterface
     */
    public function getCart();

    /**
     * @return CartInterface
     */
    public function clearCart();

    /**
     * @return int
     */
    public function getItemCount();

    /**
     * @param string $sku
     * @param int $quantity
     *
     * @return CartInterface
     */
    public function addItem($sku, $quantity = 1);

    /**
     * @param string $sku
     *
     * @return CartInterface
     */
    public function removeItem($sku);

    /**
     * @param string $sku
     * @param int $quantity
     *
     * @return CartInterface
     */
    public function changeItemQuantity($sku, $quantity = 1);

    /**
     * @param string $sku
     * @param int $quantity
     *
     * @return CartInterface
     */
    public function decreaseItemQuantity($sku, $quantity = 1);

    /**
     * @param string $sku
     * @param int $quantity
     *
     * @return CartInterface
     */
    public function increaseItemQuantity($sku, $quantity = 1);

    /**
     * @return CartInterface
     */
    public function recalculate();

    /**
     * @param string $coupon
     *
     * @return CartInterface
     */
    public function addCoupon($coupon);

    /**
     * @param string $coupon
     *
     * @return CartInterface
     */
    public function removeCoupon($coupon);

    /**
     * @return CartInterface
     */
    public function clearCoupons();

}
