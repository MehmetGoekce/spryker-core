<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductOption\Dependency\Facade;

use Spryker\Shared\Kernel\Transfer\TransferInterface;

interface ProductOptionToEventFacadeInterface
{
    /**
     * @param string $eventName
     * @param \Generated\Shared\Transfer\EventEntityTransfer $eventTransfer
     *
     * @return void
     */
    public function trigger($eventName, TransferInterface $eventTransfer);
}
