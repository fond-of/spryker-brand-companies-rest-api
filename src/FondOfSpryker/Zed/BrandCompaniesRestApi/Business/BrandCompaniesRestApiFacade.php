<?php

namespace FondOfSpryker\Zed\BrandCompaniesRestApi\Business;

use Generated\Shared\Transfer\CompanyTransfer;
use Generated\Shared\Transfer\RestCompaniesRequestAttributesTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\BrandCompaniesRestApi\Business\BrandCompaniesRestApiBusinessFactory getFactory()
 */
class BrandCompaniesRestApiFacade extends AbstractFacade implements BrandCompaniesRestApiFacadeInterface
{
    /**
     * Specification:
     * - Maps rest request brand to company.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\RestCompaniesRequestAttributesTransfer $restCompaniesRequestAttributesTransfer
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyTransfer
     */
    public function mapBrandToCompanyBusinessUnit(
        RestCompaniesRequestAttributesTransfer $restCompaniesRequestAttributesTransfer,
        CompanyTransfer $companyTransfer
    ): CompanyTransfer {
        return $this->getFactory()->createBrandsCompanyMapper()
            ->mapBrandsToCompany($restCompaniesRequestAttributesTransfer, $companyTransfer);
    }
}
