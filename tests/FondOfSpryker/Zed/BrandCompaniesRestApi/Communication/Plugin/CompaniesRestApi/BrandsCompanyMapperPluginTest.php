<?php

namespace FondOfSpryker\Zed\BrandCompaniesRestApi\Communication\Plugin\CompaniesRestApi;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\BrandCompaniesRestApi\Business\BrandCompaniesRestApiFacade;
use Generated\Shared\Transfer\CompanyTransfer;
use Generated\Shared\Transfer\RestCompaniesRequestAttributesTransfer;

class BrandsCompanyMapperPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\BrandCompaniesRestApi\Communication\Plugin\CompaniesRestApi\BrandsCompanyMapperPlugin
     */
    protected $brandsCompanyMapperPlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompaniesRequestAttributesTransfer
     */
    protected $restCompaniesRequestAttributesTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyTransfer
     */
    protected $companyTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\BrandCompaniesRestApi\Business\BrandCompaniesRestApiFacade
     */
    protected $brandCompaniesRestApiFacadeMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->restCompaniesRequestAttributesTransferMock = $this->getMockBuilder(RestCompaniesRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyTransferMock = $this->getMockBuilder(CompanyTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandCompaniesRestApiFacadeMock = $this->getMockBuilder(BrandCompaniesRestApiFacade::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandsCompanyMapperPlugin = new BrandsCompanyMapperPlugin();
        $this->brandsCompanyMapperPlugin->setFacade($this->brandCompaniesRestApiFacadeMock);
    }

    /**
     * @return void
     */
    public function testMap(): void
    {
        $this->brandCompaniesRestApiFacadeMock->expects($this->atLeastOnce())
            ->method('mapBrandToCompanyBusinessUnit')
            ->willReturn($this->companyTransferMock);

        $this->assertInstanceOf(CompanyTransfer::class, $this->brandsCompanyMapperPlugin->map(
            $this->restCompaniesRequestAttributesTransferMock,
            $this->companyTransferMock
        ));
    }
}
