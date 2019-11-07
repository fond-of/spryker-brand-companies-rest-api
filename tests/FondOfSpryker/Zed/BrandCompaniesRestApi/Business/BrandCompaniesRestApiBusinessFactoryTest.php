<?php

namespace FondOfSpryker\Zed\BrandCompaniesRestApi\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\BrandCompaniesRestApi\BrandCompaniesRestApiDependencyProvider;
use FondOfSpryker\Zed\BrandCompaniesRestApi\Business\BrandsCompany\BrandsCompanyMapperInterface;
use FondOfSpryker\Zed\BrandCompaniesRestApi\Dependency\Facade\BrandCompaniesRestApiToBrandFacadeInterface;
use Spryker\Zed\Kernel\Container;

class BrandCompaniesRestApiBusinessFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\BrandCompaniesRestApi\Business\BrandCompaniesRestApiBusinessFactory
     */
    protected $brandCompaniesRestApiBusinessFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\BrandCompaniesRestApi\Dependency\Facade\BrandCompaniesRestApiToBrandFacadeInterface
     */
    protected $brandCompaniesRestApiToBrandFacadeInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandCompaniesRestApiToBrandFacadeInterfaceMock = $this->getMockBuilder(BrandCompaniesRestApiToBrandFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandCompaniesRestApiBusinessFactory = new BrandCompaniesRestApiBusinessFactory();
        $this->brandCompaniesRestApiBusinessFactory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testCreateBrandsCompanyMapper(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(BrandCompaniesRestApiDependencyProvider::FACADE_BRAND)
            ->willReturn($this->brandCompaniesRestApiToBrandFacadeInterfaceMock);

        $this->assertInstanceOf(BrandsCompanyMapperInterface::class, $this->brandCompaniesRestApiBusinessFactory->createBrandsCompanyMapper());
    }
}
