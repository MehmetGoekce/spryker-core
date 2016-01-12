<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Zed\Product\Business\Product;

use Generated\Shared\Transfer\ProductAbstractTransfer;
use Generated\Shared\Transfer\ConcreteProductTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\UrlTransfer;
use Propel\Runtime\Exception\PropelException;
use Spryker\Zed\Product\Business\Exception\ProductAbstractExistsException;
use Spryker\Zed\Product\Business\Exception\ConcreteProductExistsException;
use Spryker\Zed\Product\Business\Exception\MissingProductException;
use Spryker\Zed\Url\Business\Exception\UrlExistsException;

interface ProductManagerInterface
{

    /**
     * @param string $sku
     *
     * @return bool
     */
    public function hasProductAbstract($sku);

    /**
     * @param ProductAbstractTransfer $productAbstractTransfer
     *
     * @throws ProductAbstractExistsException
     *
     * @return int
     */
    public function createProductAbstract(ProductAbstractTransfer $productAbstractTransfer);

    /**
     * @param string $sku
     *
     * @throws MissingProductException
     *
     * @return int
     */
    public function getProductAbstractIdBySku($sku);

    /**
     * @param ConcreteProductTransfer $concreteProductTransfer
     * @param int $idProductAbstract
     *
     * @throws ConcreteProductExistsException
     *
     * @return int
     */
    public function createConcreteProduct(ConcreteProductTransfer $concreteProductTransfer, $idProductAbstract);

    /**
     * @param string $sku
     *
     * @return bool
     */
    public function hasConcreteProduct($sku);

    /**
     * @param string $sku
     *
     * @throws MissingProductException
     *
     * @return int
     */
    public function getConcreteProductIdBySku($sku);

    /**
     * @param int $idProductAbstract
     */
    public function touchProductActive($idProductAbstract);

    /**
     * @param string $sku
     * @param string $url
     * @param LocaleTransfer $locale
     *
     * @throws PropelException
     * @throws UrlExistsException
     * @throws MissingProductException
     *
     * @return UrlTransfer
     */
    public function createProductUrl($sku, $url, LocaleTransfer $locale);

    /**
     * @param int $idProductAbstract
     * @param string $url
     * @param LocaleTransfer $locale
     *
     * @throws PropelException
     * @throws UrlExistsException
     * @throws MissingProductException
     *
     * @return UrlTransfer
     */
    public function createProductUrlByIdProduct($idProductAbstract, $url, LocaleTransfer $locale);

    /**
     * @param string $sku
     * @param string $url
     * @param LocaleTransfer $locale
     *
     * @throws PropelException
     * @throws UrlExistsException
     * @throws MissingProductException
     *
     * @return UrlTransfer
     */
    public function createAndTouchProductUrl($sku, $url, LocaleTransfer $locale);

    /**
     * @param int $idProductAbstract
     * @param string $url
     * @param LocaleTransfer $locale
     *
     * @throws PropelException
     * @throws UrlExistsException
     * @throws MissingProductException
     *
     * @return UrlTransfer
     */
    public function createAndTouchProductUrlByIdProduct($idProductAbstract, $url, LocaleTransfer $locale);

    /**
     * @param string $sku
     *
     * @throws MissingProductException
     *
     * @return float
     */
    public function getEffectiveTaxRateForConcreteProduct($sku);

    /**
     * @param string $sku
     *
     * @throws MissingProductException
     *
     * @return int
     */
    public function getProductAbstractIdByConcreteSku($sku);

    /**
     * @param string $sku
     *
     * @throws MissingProductException
     *
     * @return string
     */
    public function getAbstractSkuFromConcreteProduct($sku);

    /**
     * @param string $concreteSku
     *
     * @return ConcreteProductTransfer
     */
    public function getConcreteProduct($concreteSku);

}
