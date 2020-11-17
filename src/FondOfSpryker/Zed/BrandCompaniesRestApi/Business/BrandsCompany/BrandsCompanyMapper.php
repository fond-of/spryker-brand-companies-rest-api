<?php

namespace FondOfSpryker\Zed\BrandCompaniesRestApi\Business\BrandsCompany;

use FondOfSpryker\Zed\BrandCompaniesRestApi\Dependency\Facade\BrandCompaniesRestApiToBrandFacadeInterface;
use Generated\Shared\Transfer\CompanyBrandRelationTransfer;
use Generated\Shared\Transfer\CompanyTransfer;
use Generated\Shared\Transfer\RestCompaniesRequestAttributesTransfer;

class BrandsCompanyMapper implements BrandsCompanyMapperInterface
{
    /**
     * @var \FondOfSpryker\Zed\BrandCompaniesRestApi\Dependency\Facade\BrandCompaniesRestApiToBrandFacadeInterface
     */
    protected $brandFacade;

    /**
     * @param \FondOfSpryker\Zed\BrandCompaniesRestApi\Dependency\Facade\BrandCompaniesRestApiToBrandFacadeInterface $brandFacade
     */
    public function __construct(
        BrandCompaniesRestApiToBrandFacadeInterface $brandFacade
    ) {
        $this->brandFacade = $brandFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\RestCompaniesRequestAttributesTransfer $restCompaniesRequestAttributesTransfer
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyTransfer
     */
    public function mapBrandsToCompany(
        RestCompaniesRequestAttributesTransfer $restCompaniesRequestAttributesTransfer,
        CompanyTransfer $companyTransfer
    ): CompanyTransfer {
        $restBrandTransfers = $restCompaniesRequestAttributesTransfer->getBrands();

        if (count($restBrandTransfers) === 0) {
            return $companyTransfer;
        }

        $idBrands = [];

        foreach ($restBrandTransfers as $restBrandTransfer) {
            $name = $restBrandTransfer->getName();

            if ($name === null) {
                continue;
            }

            $brandTransfer = $this->brandFacade->findByName($name);

            if ($brandTransfer === null || $brandTransfer->getIdBrand() === null) {
                continue;
            }

            $idBrands[] = $brandTransfer->getIdBrand();
        }

        $companyBrandRelationTransfer = $this->createCompanyBrandRelationTransfer($companyTransfer->getIdCompany(), $idBrands);

        $companyTransfer->setBrandRelation($companyBrandRelationTransfer);

        return $companyTransfer;
    }

    /**
     * @param int|null $idCompany
     * @param array $idBrands
     *
     * @return \Generated\Shared\Transfer\CompanyBrandRelationTransfer
     */
    protected function createCompanyBrandRelationTransfer(?int $idCompany, array $idBrands): CompanyBrandRelationTransfer
    {
        $companyBrandRelationTransfer = new CompanyBrandRelationTransfer();

        $companyBrandRelationTransfer->setIdCompany($idCompany)
            ->setIdBrands($idBrands);

        return $companyBrandRelationTransfer;
    }
}
