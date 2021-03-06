<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CompanyBusinessUnitDataImport\Business\Model\Step;

use Orm\Zed\CompanyBusinessUnit\Persistence\Map\SpyCompanyBusinessUnitTableMap;
use Orm\Zed\CompanyBusinessUnit\Persistence\SpyCompanyBusinessUnitQuery;
use Spryker\Zed\CompanyBusinessUnitDataImport\Business\Model\DataSet\CompanyBusinessUnitDataSet;
use Spryker\Zed\DataImport\Business\Exception\EntityNotFoundException;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class ParentBusinessUnitKeyToIdCompanyBusinessUnitStep implements DataImportStepInterface
{
    /**
     * @var array
     */
    protected $idCompanyBusinessUnitCache = [];

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @throws \Spryker\Zed\DataImport\Business\Exception\EntityNotFoundException
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $companyBusinessUnitKey = $dataSet[CompanyBusinessUnitDataSet::PARENT_BUSINESS_UNIT_KEY];
        if (!$companyBusinessUnitKey) {
            return;
        }
        if (!isset($this->idCompanyBusinessUnitCache[$companyBusinessUnitKey])) {
            $idCompany = $dataSet[CompanyBusinessUnitDataSet::ID_COMPANY];
            $companyBusinessUnitQuery = SpyCompanyBusinessUnitQuery::create();
            $idCompanyBusinessUnit = $companyBusinessUnitQuery
                ->filterByFkCompany($idCompany)
                ->select(SpyCompanyBusinessUnitTableMap::COL_ID_COMPANY_BUSINESS_UNIT)
                ->findOneByKey($companyBusinessUnitKey);

            if (!$idCompanyBusinessUnit) {
                throw new EntityNotFoundException(sprintf(
                    'Could not find company business unit by key "%s"',
                    $companyBusinessUnitKey
                ));
            }

            $this->idCompanyBusinessUnitCache[$companyBusinessUnitKey] = $idCompanyBusinessUnit;
        }

        $dataSet[CompanyBusinessUnitDataSet::FK_PARENT_BUSINESS_UNIT] = $this->idCompanyBusinessUnitCache[$companyBusinessUnitKey];
    }
}
