<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ShoppingList\Communication\Plugin;

use Spryker\Shared\PermissionExtension\Dependency\Plugin\ExecutablePermissionPluginInterface;
use Spryker\Shared\ShoppingList\ShoppingListConfig;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \Spryker\Zed\ShoppingList\Business\ShoppingListFacadeInterface getFacade()
 * @method \Spryker\Zed\ShoppingList\Communication\ShoppingListCommunicationFactory getFactory()
 */
class ReadShoppingListPermissionPlugin extends AbstractPlugin implements ExecutablePermissionPluginInterface
{
    public const KEY = ShoppingListConfig::READ_SHOPPING_LIST_PERMISSION_PLUGIN_KEY;

    /**
     * @return string
     */
    public function getKey(): string
    {
        return static::KEY;
    }

    /**
     * {@inheritdoc}
     *
     * @param array $configuration
     * @param int|null $idShoppingList
     *
     * @return bool
     */
    public function can(array $configuration, $idShoppingList = null): bool
    {
        if (!$idShoppingList) {
            return false;
        }

        return in_array($idShoppingList, $configuration[ShoppingListConfig::PERMISSION_CONFIG_ID_SHOPPING_LIST_COLLECTION]);
    }

    /**
     * @api
     *
     * @return array
     */
    public function getConfigurationSignature(): array
    {
        return [];
    }
}
