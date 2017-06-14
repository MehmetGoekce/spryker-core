<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CmsBlockGui;

use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Zed\Kernel\AbstractBundleConfig;

class CmsBlockGuiConfig extends AbstractBundleConfig
{

    const CMS_BLOCK_TEMPLATE_PATH = '@Cms/template/';

    /**
     * @return string|null
     */
    public function findYvesHost()
    {
        $config = $this->getConfig();

        $yvesHost = null;
        if ($config->hasKey(ApplicationConstants::HOST_YVES)) {
            $yvesHost = $config->get(ApplicationConstants::HOST_YVES);
        }

        return $yvesHost;
    }

}
