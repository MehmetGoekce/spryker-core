<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CompanyBusinessUnit\Persistence;

interface BusinessUnitQueryContainerInterface
{
    /**
     * @api
     *
     * @param int $idCompanyBusinessUnit
     *
     * @return \Orm\Zed\CompanyBusinessUnit\Persistence\SpyCompanyBusinessUnit
     */
    public function queryCompanyBusinessUnitById($idCompanyBusinessUnit);
}
