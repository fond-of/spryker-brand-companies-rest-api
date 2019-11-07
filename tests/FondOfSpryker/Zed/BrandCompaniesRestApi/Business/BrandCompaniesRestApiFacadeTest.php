<?php

namespace FondOfSpryker\Zed\BrandCompaniesRestApi\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\BrandCompaniesRestApi\Business\BrandsCompany\BrandsCompanyMapperInterface;
use Generated\Shared\Transfer\CompanyTransfer;
use Generated\Shared\Transfer\RestCompaniesRequestAttributesTransfer;

class BrandCompaniesRestApiFacadeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\BrandCompaniesRestApi\Business\BrandCompaniesRestApiFacade
     */
    protected $brandCompaniesRestApiFacade;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\BrandCompaniesRestApi\Business\BrandCompaniesRestApiBusinessFactory
     */
    protected $brandCompaniesRestApiBusinessFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompaniesRequestAttributesTransfer
     */
    protected $restCompaniesRequestAttributesTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyTransfer
     */
    protected $companyTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\BrandCompaniesRestApi\Business\BrandsCompany\BrandsCompanyMapperInterface
     */
    protected $brandsCompanyMapperInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->brandCompaniesRestApiBusinessFactoryMock = $this->getMockBuilder(BrandCompaniesRestApiBusinessFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompaniesRequestAttributesTransferMock = $this->getMockBuilder(RestCompaniesRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyTransferMock = $this->getMockBuilder(CompanyTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandsCompanyMapperInterfaceMock = $this->getMockBuilder(BrandsCompanyMapperInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandCompaniesRestApiFacade = new BrandCompaniesRestApiFacade();
        $this->brandCompaniesRestApiFacade->setFactory($this->brandCompaniesRestApiBusinessFactoryMock);
    }

    /**
     * @return void
     */
    public function testBrandToCompanyBusinessUnit(): void
    {
        $this->brandCompaniesRestApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createBrandsCompanyMapper')
            ->willReturn($this->brandsCompanyMapperInterfaceMock);

        $this->brandsCompanyMapperInterfaceMock->expects($this->atLeastOnce())
            ->method('mapBrandsToCompany')
            ->willReturn($this->companyTransferMock);

        $this->assertInstanceOf(CompanyTransfer::class, $this->brandCompaniesRestApiFacade->mapBrandToCompanyBusinessUnit(
            $this->restCompaniesRequestAttributesTransferMock,
            $this->companyTransferMock
        ));
    }
}
