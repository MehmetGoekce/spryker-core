<?php

/**
 * Copyright© 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\CartsRestApi;

use Spryker\Glue\CartsRestApi\Dependency\Client\CartsRestApiToCartClientInterface;
use Spryker\Glue\CartsRestApi\Dependency\Client\CartsRestApiToMultiCartClientInterface;
use Spryker\Glue\CartsRestApi\Dependency\Client\CartsRestApiToPersistentCartClientInterface;
use Spryker\Glue\CartsRestApi\Dependency\Client\CartsRestApiToQuoteClientInterface;
use Spryker\Glue\CartsRestApi\Dependency\Client\CartsRestApiToZedRequestClientInterface;
use Spryker\Glue\CartsRestApi\Processor\CartItems\CartItemsWriter;
use Spryker\Glue\CartsRestApi\Processor\CartItems\CartItemsWriterInterface;
use Spryker\Glue\CartsRestApi\Processor\Carts\CartsReader;
use Spryker\Glue\CartsRestApi\Processor\Carts\CartsReaderInterface;
use Spryker\Glue\CartsRestApi\Processor\Carts\CartsWriter;
use Spryker\Glue\CartsRestApi\Processor\Carts\CartsWriterInterface;
use Spryker\Glue\CartsRestApi\Processor\Mapper\CartItemsResourceMapper;
use Spryker\Glue\CartsRestApi\Processor\Mapper\CartItemsResourceMapperInterface;
use Spryker\Glue\CartsRestApi\Processor\Mapper\CartsResourceMapper;
use Spryker\Glue\CartsRestApi\Processor\Mapper\CartsResourceMapperInterface;
use Spryker\Glue\Kernel\AbstractFactory;

class CartsRestApiFactory extends AbstractFactory
{
    /**
     * @return \Spryker\Glue\CartsRestApi\Processor\Carts\CartsReaderInterface
     */
    public function createCartsReader(): CartsReaderInterface
    {
        return new CartsReader(
            $this->getResourceBuilder(),
            $this->createCartsResourceMapper(),
            $this->getMultiCartClient()
        );
    }

    /**
     * @return \Spryker\Glue\CartsRestApi\Processor\Carts\CartsWriterInterface
     */
    public function createCartsWriter(): CartsWriterInterface
    {
        return new CartsWriter(
            $this->getResourceBuilder(),
            $this->createCartsResourceMapper(),
            $this->getPersistentCartClient(),
            $this->createCartsReader()
        );
    }

    /**
     * @return \Spryker\Glue\CartsRestApi\Processor\CartItems\CartItemsWriterInterface
     */
    public function createCartItemsWriter(): CartItemsWriterInterface
    {
        return new CartItemsWriter(
            $this->getCartClient(),
            $this->createCartItemsResourceMapper(),
            $this->getResourceBuilder(),
            $this->getZedRequestClient(),
            $this->getQuoteClient(),
            $this->createCartsReader()
        );
    }

    /**
     * @return \Spryker\Glue\CartsRestApi\Processor\Mapper\CartItemsResourceMapperInterface
     */
    public function createCartItemsResourceMapper(): CartItemsResourceMapperInterface
    {
        return new CartItemsResourceMapper();
    }

    /**
     * @return \Spryker\Glue\CartsRestApi\Processor\Mapper\CartsResourceMapperInterface
     */
    public function createCartsResourceMapper(): CartsResourceMapperInterface
    {
        return new CartsResourceMapper($this->createCartItemsResourceMapper(), $this->getResourceBuilder());
    }

    /**
     * @return \Spryker\Glue\CartsRestApi\Dependency\Client\CartsRestApiToZedRequestClientInterface
     */
    public function getZedRequestClient(): CartsRestApiToZedRequestClientInterface
    {
        return $this->getProvidedDependency(CartsRestApiDependencyProvider::CLIENT_ZED_REQUEST);
    }

    /**
     * @return \Spryker\Glue\CartsRestApi\Dependency\Client\CartsRestApiToQuoteClientInterface
     */
    public function getQuoteClient(): CartsRestApiToQuoteClientInterface
    {
        return $this->getProvidedDependency(CartsRestApiDependencyProvider::CLIENT_QUOTE);
    }

    /**
     * @return \Spryker\Glue\CartsRestApi\Dependency\Client\CartsRestApiToCartClientInterface
     */
    public function getCartClient(): CartsRestApiToCartClientInterface
    {
        return $this->getProvidedDependency(CartsRestApiDependencyProvider::CLIENT_CART);
    }

    /**
     * @return \Spryker\Glue\CartsRestApi\Dependency\Client\CartsRestApiToMultiCartClientInterface
     */
    public function getMultiCartClient(): CartsRestApiToMultiCartClientInterface
    {
        return $this->getProvidedDependency(CartsRestApiDependencyProvider::CLIENT_MULTICART);
    }

    /**
     * @return \Spryker\Glue\CartsRestApi\Dependency\Client\CartsRestApiToPersistentCartClientInterface
     */
    public function getPersistentCartClient(): CartsRestApiToPersistentCartClientInterface
    {
        return $this->getProvidedDependency(CartsRestApiDependencyProvider::CLIENT_PERSISTENT_CART);
    }
}
