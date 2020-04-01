<?php

namespace FondOfSpryker\Zed\BrandCompaniesRestApi\Business\BrandsCompany;

use ArrayObject;
use Codeception\Test\Unit;
use FondOfSpryker\Zed\BrandCompaniesRestApi\Dependency\Facade\BrandCompaniesRestApiToBrandFacadeInterface;
use Generated\Shared\Transfer\BrandTransfer;
use Generated\Shared\Transfer\CompanyTransfer;
use Generated\Shared\Transfer\RestBrandTransfer;
use Generated\Shared\Transfer\RestCompaniesRequestAttributesTransfer;

class BrandsCompanyMapperTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\BrandCompaniesRestApi\Business\BrandsCompany\BrandsCompanyMapper
     */
    protected $brandsCompanyMapper;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\BrandCompaniesRestApi\Dependency\Facade\BrandCompaniesRestApiToBrandFacadeInterface
     */
    protected $brandCompaniesRestApiToBrandFacadeInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompaniesRequestAttributesTransfer
     */
    protected $restCompaniesRequestAttributesTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyTransfer
     */
    protected $companyTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestBrandTransfer
     */
    protected $restBrandTransferMock;

    /**
     * @var \ArrayObject
     */
    protected $restBrandTransferMocks;

    /**
     * @var string
     */
    protected $nameBrand;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\BrandTransfer
     */
    protected $brandTransferMock;

    /**
     * @var int
     */
    protected $idBrand;

    /**
     * @var int
     */
    protected $idCompany;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->brandCompaniesRestApiToBrandFacadeInterfaceMock = $this->getMockBuilder(BrandCompaniesRestApiToBrandFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompaniesRequestAttributesTransferMock = $this->getMockBuilder(RestCompaniesRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyTransferMock = $this->getMockBuilder(CompanyTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restBrandTransferMock = $this->getMockBuilder(RestBrandTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restBrandTransferMocks = new ArrayObject([
            $this->restBrandTransferMock,
        ]);

        $this->nameBrand = "brand-name";

        $this->idBrand = 1;

        $this->brandTransferMock = $this->getMockBuilder(BrandTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->idCompany = 2;

        $this->brandsCompanyMapper = new BrandsCompanyMapper(
            $this->brandCompaniesRestApiToBrandFacadeInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testMapBrandsToCompany(): void
    {
        $this->restCompaniesRequestAttributesTransferMock->expects($this->atLeastOnce())
            ->method('getBrands')
            ->willReturn($this->restBrandTransferMocks);

        $this->restBrandTransferMock->expects($this->atLeastOnce())
            ->method('getName')
            ->willReturn($this->nameBrand);

        $this->brandCompaniesRestApiToBrandFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('findByName')
            ->willReturn($this->brandTransferMock);

        $this->brandTransferMock->expects($this->atLeastOnce())
            ->method('getIdBrand')
            ->willReturn($this->idBrand);

        $this->companyTransferMock->expects($this->atLeastOnce())
            ->method('getIdCompany')
            ->willReturn($this->idCompany);

        $this->companyTransferMock->expects($this->atLeastOnce())
            ->method('setBrandRelation')
            ->willReturn($this->companyTransferMock);

        $this->assertInstanceOf(CompanyTransfer::class, $this->brandsCompanyMapper->mapBrandsToCompany(
            $this->restCompaniesRequestAttributesTransferMock,
            $this->companyTransferMock
        ));
    }

    /**
     * @return void
     */
    public function testMapBrandsToCompanyBrandTransferNull(): void
    {
        $this->restCompaniesRequestAttributesTransferMock->expects($this->atLeastOnce())
            ->method('getBrands')
            ->willReturn($this->restBrandTransferMocks);

        $this->restBrandTransferMock->expects($this->atLeastOnce())
            ->method('getName')
            ->willReturn($this->nameBrand);

        $this->brandCompaniesRestApiToBrandFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('findByName')
            ->willReturn(null);

        $this->assertInstanceOf(CompanyTransfer::class, $this->brandsCompanyMapper->mapBrandsToCompany(
            $this->restCompaniesRequestAttributesTransferMock,
            $this->companyTransferMock
        ));
    }

    /**
     * @return void
     */
    public function testMapBrandsToCompanyNameBrandNull(): void
    {
        $this->restCompaniesRequestAttributesTransferMock->expects($this->atLeastOnce())
            ->method('getBrands')
            ->willReturn($this->restBrandTransferMocks);

        $this->restBrandTransferMock->expects($this->atLeastOnce())
            ->method('getName')
            ->willReturn(null);

        $this->assertInstanceOf(CompanyTransfer::class, $this->brandsCompanyMapper->mapBrandsToCompany(
            $this->restCompaniesRequestAttributesTransferMock,
            $this->companyTransferMock
        ));
    }

    /**
     * @return void
     */
    public function testMapBrandsToCompanyNoBrands(): void
    {
        $this->restCompaniesRequestAttributesTransferMock->expects($this->atLeastOnce())
            ->method('getBrands')
            ->willReturn(new ArrayObject());

        $this->assertInstanceOf(CompanyTransfer::class, $this->brandsCompanyMapper->mapBrandsToCompany(
            $this->restCompaniesRequestAttributesTransferMock,
            $this->companyTransferMock
        ));
    }
}
