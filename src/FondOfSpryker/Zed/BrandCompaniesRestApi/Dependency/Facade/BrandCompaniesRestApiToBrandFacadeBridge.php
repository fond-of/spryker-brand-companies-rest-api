<?php

namespace FondOfSpryker\Zed\BrandCompaniesRestApi\Dependency\Facade;

use FondOfSpryker\Zed\Brand\Business\BrandFacadeInterface;
use Generated\Shared\Transfer\BrandTransfer;

class BrandCompaniesRestApiToBrandFacadeBridge implements BrandCompaniesRestApiToBrandFacadeInterface
{
    /**
     * @var \FondOfSpryker\Zed\Brand\Business\BrandFacadeInterface
     */
    protected $brandFacade;

    /**
     * @param \FondOfSpryker\Zed\Brand\Business\BrandFacadeInterface $brandFacade
     */
    public function __construct(BrandFacadeInterface $brandFacade)
    {
        $this->brandFacade = $brandFacade;
    }

    /**
     * @param string $name
     *
     * @return \Generated\Shared\Transfer\BrandTransfer|null
     */
    public function findByName(string $name): ?BrandTransfer
    {
        return $this->brandFacade->findByName($name);
    }
}
