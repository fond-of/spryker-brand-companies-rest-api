<?php

namespace FondOfSpryker\Zed\BrandCompaniesRestApi\Dependency\Facade;

use Generated\Shared\Transfer\BrandTransfer;

interface BrandCompaniesRestApiToBrandFacadeInterface
{
    /**
     * @param string $name
     *
     * @return \Generated\Shared\Transfer\BrandTransfer|null
     */
    public function findByName(string $name): ?BrandTransfer;
}
