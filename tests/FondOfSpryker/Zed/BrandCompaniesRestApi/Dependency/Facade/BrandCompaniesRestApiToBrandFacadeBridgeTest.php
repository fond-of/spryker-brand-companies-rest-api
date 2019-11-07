<?php

namespace FondOfSpryker\Zed\BrandCompaniesRestApi\Dependency\Facade;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\Brand\Business\BrandFacadeInterface;
use Generated\Shared\Transfer\BrandTransfer;

class BrandCompaniesRestApiToBrandFacadeBridgeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\BrandCompaniesRestApi\Dependency\Facade\BrandCompaniesRestApiToBrandFacadeBridge
     */
    protected $brandCompaniesRestApiToBrandFacadeBridge;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\Brand\Business\BrandFacadeInterface
     */
    protected $brandFacadeInterfaceMock;

    /**
     * @var string
     */
    protected $nameBrand;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\BrandTransfer
     */
    protected $brandTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->brandFacadeInterfaceMock = $this->getMockBuilder(BrandFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->nameBrand = "brand-name";

        $this->brandTransferMock = $this->getMockBuilder(BrandTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandCompaniesRestApiToBrandFacadeBridge = new BrandCompaniesRestApiToBrandFacadeBridge(
            $this->brandFacadeInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testFindByName(): void
    {
        $this->brandFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('findByName')
            ->willReturn($this->brandTransferMock);

        $this->assertInstanceOf(BrandTransfer::class, $this->brandCompaniesRestApiToBrandFacadeBridge->findByName($this->nameBrand));
    }
}
