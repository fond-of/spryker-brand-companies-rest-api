<?php

namespace FondOfSpryker\Zed\BrandCompaniesRestApi\Communication\Plugin\CompaniesRestApi;

use FondOfSpryker\Zed\CompaniesRestApi\Dependency\Plugin\CompanyMapperPluginInterface;
use Generated\Shared\Transfer\CompanyTransfer;
use Generated\Shared\Transfer\RestCompaniesRequestAttributesTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\BrandCompanyBusinessUnitsRestApi\Business\BrandCompanyBusinessUnitsRestApiFacadeInterface getFacade()
 */
class BrandsCompanyMapperPlugin extends AbstractPlugin implements CompanyMapperPluginInterface
{
    /**
     * Specification:
     * - Maps rest company request data to company transfer.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\RestCompaniesRequestAttributesTransfer $restCompaniesRequestAttributesTransfer
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return void
     */
    public function map(
        RestCompaniesRequestAttributesTransfer $restCompaniesRequestAttributesTransfer,
        CompanyTransfer $companyTransfer
    ): CompanyTransfer {
        // TODO: Implement map() method.
    }
}
