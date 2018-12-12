<?php

namespace FondOfSpryker\Zed\BrandCompaniesRestApi\Business;

use Generated\Shared\Transfer\CompanyTransfer;
use Generated\Shared\Transfer\RestCompaniesRequestAttributesTransfer;

interface BrandCompaniesRestApiFacadeInterface
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
    ): CompanyTransfer;
}
