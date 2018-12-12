<?php

namespace FondOfSpryker\Zed\BrandCompaniesRestApi\Business;

use FondOfSpryker\Zed\BrandCompaniesRestApi\BrandCompaniesRestApiDependencyProvider;
use FondOfSpryker\Zed\BrandCompaniesRestApi\Business\BrandsCompany\BrandsCompanyMapper;
use FondOfSpryker\Zed\BrandCompaniesRestApi\Business\BrandsCompany\BrandsCompanyMapperInterface;
use FondOfSpryker\Zed\BrandCompaniesRestApi\Dependency\Facade\BrandCompaniesRestApiToBrandFacadeInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

class BrandCompaniesRestApiBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\BrandCompaniesRestApi\Business\BrandsCompany\BrandsCompanyMapperInterface
     */
    public function createBrandsCompanyMapper(): BrandsCompanyMapperInterface
    {
        return new BrandsCompanyMapper(
            $this->getBrandFacade()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\BrandCompaniesRestApi\Dependency\Facade\BrandCompaniesRestApiToBrandFacadeInterface
     */
    protected function getBrandFacade(): BrandCompaniesRestApiToBrandFacadeInterface
    {
        return $this->getProvidedDependency(BrandCompaniesRestApiDependencyProvider::FACADE_BRAND);
    }
}
