<?php

namespace FondOfSpryker\Zed\BrandCompaniesRestApi\Business\BrandsCompany;

use Generated\Shared\Transfer\CompanyTransfer;
use Generated\Shared\Transfer\RestCompaniesRequestAttributesTransfer;

interface BrandsCompanyMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\RestCompaniesRequestAttributesTransfer $restCompaniesRequestAttributesTransfer
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyTransfer
     */
    public function mapBrandsToCompany(
        RestCompaniesRequestAttributesTransfer $restCompaniesRequestAttributesTransfer,
        CompanyTransfer $companyTransfer
    ): CompanyTransfer;
}
