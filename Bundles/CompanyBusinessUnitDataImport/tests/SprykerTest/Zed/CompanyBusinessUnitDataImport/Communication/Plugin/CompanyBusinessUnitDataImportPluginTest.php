<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerTest\Zed\CompanyBusinessUnitDataImport\Communication\Plugin;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\DataImporterConfigurationTransfer;
use Generated\Shared\Transfer\DataImporterReaderConfigurationTransfer;
use Generated\Shared\Transfer\DataImporterReportTransfer;
use ReflectionClass;
use Spryker\Zed\CompanyBusinessUnitDataImport\Business\CompanyBusinessUnitDataImportBusinessFactory;
use Spryker\Zed\CompanyBusinessUnitDataImport\Business\CompanyBusinessUnitDataImportFacade;
use Spryker\Zed\CompanyBusinessUnitDataImport\Communication\Plugin\CompanyBusinessUnitDataImportPlugin;
use Spryker\Zed\CompanyBusinessUnitDataImport\CompanyBusinessUnitDataImportConfig;
use Spryker\Zed\DataImport\Business\Exception\DataImportException;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetStepBroker;

/**
 * Auto-generated group annotations
 *
 * @group SprykerTest
 * @group Zed
 * @group CompanyBusinessUnitDataImport
 * @group Communication
 * @group Plugin
 * @group CompanyBusinessUnitDataImportPluginTest
 * Add your own group annotations below this line
 */
class CompanyBusinessUnitDataImportPluginTest extends Unit
{
    protected const EXCEPTION_DATA_IMPORT_COMPANY_NO_FOUND_MESSAGE = 'Could not find company by key "invalid company"';
    protected const IMPORT_COMPANY_BUSINESS_UNIT_CSV = 'import/company_business_unit.csv';
    protected const IMPORT_COMPANY_BUSINESS_UNIT_WITH_INVALID_COMPANY_CSV = 'import/company_business_unit_with_invalid_company.csv';
    protected const IMPORT_COMPANY_BUSINESS_UNIT_WITH_INVALID_PARENT_CSV = 'import/company_business_unit_with_invalid_parent.csv';

    /**
     * @var \SprykerTest\Zed\CompanyBusinessUnitDataImport\CompanyBusinessUnitDataImportCommunicationTester
     */
    protected $tester;

    /**
     * @return void
     */
    public function testImportImportsCompanyBusinessUnit(): void
    {
        $this->tester->ensureDatabaseTableIsEmpty();
        $this->tester->haveCompany(['key' => 'spryker']);

        $dataImportConfigurationTransfer = $this->getDataImportConfigurationTransfer(
            self::IMPORT_COMPANY_BUSINESS_UNIT_CSV
        );
        $dataImportConfigurationTransfer->setThrowException(true);

        $companyBusinessUnitDataImportPlugin = new CompanyBusinessUnitDataImportPlugin();

        $pluginReflection = new ReflectionClass($companyBusinessUnitDataImportPlugin);

        $facadePropertyReflection = $pluginReflection->getParentClass()->getProperty('facade');
        $facadePropertyReflection->setAccessible(true);
        $facadePropertyReflection->setValue($companyBusinessUnitDataImportPlugin, $this->getFacadeMock());

        $dataImporterReportTransfer = $companyBusinessUnitDataImportPlugin->import($dataImportConfigurationTransfer);

        $this->assertInstanceOf(DataImporterReportTransfer::class, $dataImporterReportTransfer);

        $this->tester->assertDatabaseTableContainsData();
    }

    /**
     * @return void
     */
    public function testImportThrowsExceptionWhenCompanyNotFound(): void
    {
        $this->tester->ensureDatabaseTableIsEmpty();

        $dataImportConfigurationTransfer = $this->getDataImportConfigurationTransfer(
            self::IMPORT_COMPANY_BUSINESS_UNIT_WITH_INVALID_COMPANY_CSV
        );
        $dataImportConfigurationTransfer->setThrowException(true);

        $companyBusinessUnitDataImportPlugin = new CompanyBusinessUnitDataImportPlugin();

        $this->expectException(DataImportException::class);
        $this->expectExceptionMessage(static::EXCEPTION_DATA_IMPORT_COMPANY_NO_FOUND_MESSAGE);

        $pluginReflection = new ReflectionClass($companyBusinessUnitDataImportPlugin);

        $facadePropertyReflection = $pluginReflection->getParentClass()->getProperty('facade');
        $facadePropertyReflection->setAccessible(true);
        $facadePropertyReflection->setValue($companyBusinessUnitDataImportPlugin, $this->getFacadeMock());

        $companyBusinessUnitDataImportPlugin->import($dataImportConfigurationTransfer);
    }

    /**
     * @return void
     */
    public function testImportThrowsExceptionWhenParentBusinessUnitNotFound(): void
    {
        $this->tester->ensureDatabaseTableIsEmpty();
        $this->tester->haveActiveCompany(['key' => 'spryker']);
        $dataImportConfigurationTransfer = $this->getDataImportConfigurationTransfer(
            self::IMPORT_COMPANY_BUSINESS_UNIT_WITH_INVALID_PARENT_CSV
        );
        $dataImportConfigurationTransfer->setThrowException(true);

        $companyBusinessUnitDataImportPlugin = new CompanyBusinessUnitDataImportPlugin();

        $this->expectException(DataImportException::class);
        $this->expectExceptionMessage('Could not find company business unit by key "invalid parent"');

        $pluginReflection = new ReflectionClass($companyBusinessUnitDataImportPlugin);

        $facadePropertyReflection = $pluginReflection->getParentClass()->getProperty('facade');
        $facadePropertyReflection->setAccessible(true);
        $facadePropertyReflection->setValue($companyBusinessUnitDataImportPlugin, $this->getFacadeMock());

        $companyBusinessUnitDataImportPlugin->import($dataImportConfigurationTransfer);
    }

    /**
     * @return \Spryker\Zed\CompanyBusinessUnitDataImport\Business\CompanyBusinessUnitDataImportFacade
     */
    public function getFacadeMock()
    {
        $factoryMock = $this->getMockBuilder(CompanyBusinessUnitDataImportBusinessFactory::class)
            ->setMethods(
                [
                    'createTransactionAwareDataSetStepBroker',
                    'getConfig',
                ]
            )
            ->getMock();

        $factoryMock
            ->method('createTransactionAwareDataSetStepBroker')
            ->willReturn(new DataSetStepBroker());

        $factoryMock->method('getConfig')
            ->willReturn(new CompanyBusinessUnitDataImportConfig());

        $facade = new CompanyBusinessUnitDataImportFacade();
        $facade->setFactory($factoryMock);

        return $facade;
    }

    /**
     * @return void
     */
    public function testGetImportTypeReturnsTypeOfImporter(): void
    {
        $companyBusinessUnitDataImportPlugin = new CompanyBusinessUnitDataImportPlugin();
        $this->assertSame(
            CompanyBusinessUnitDataImportConfig::IMPORT_TYPE_COMPANY_BUSINESS_UNIT,
            $companyBusinessUnitDataImportPlugin->getImportType()
        );
    }

    /**
     * @param string $file
     *
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    protected function getDataImportConfigurationTransfer(string $file): DataImporterConfigurationTransfer
    {
        $dataImporterReaderConfigurationTransfer = new DataImporterReaderConfigurationTransfer();
        $dataImporterReaderConfigurationTransfer->setFileName(codecept_data_dir() . $file);

        $dataImportConfigurationTransfer = new DataImporterConfigurationTransfer();
        $dataImportConfigurationTransfer->setReaderConfiguration($dataImporterReaderConfigurationTransfer);

        return $dataImportConfigurationTransfer;
    }
}
