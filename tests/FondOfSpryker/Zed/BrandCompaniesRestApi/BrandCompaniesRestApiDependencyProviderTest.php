<?php

namespace FondOfSpryker\Zed\BrandCompaniesRestApi;

use Codeception\Test\Unit;
use Spryker\Zed\Kernel\Container;

class BrandCompaniesRestApiDependencyProviderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\BrandCompaniesRestApi\BrandCompaniesRestApiDependencyProvider
     */
    protected $brandCompaniesRestApiDependencyProvider;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandCompaniesRestApiDependencyProvider = new BrandCompaniesRestApiDependencyProvider();
    }

    /**
     * @return void
     */
    public function testProvideBusinessLayerDependencies(): void
    {
        $this->assertInstanceOf(Container::class, $this->brandCompaniesRestApiDependencyProvider->provideBusinessLayerDependencies($this->containerMock));
    }
}
