<?php

namespace Shellpea\ProductList\Block;

class Index extends \Magento\Framework\View\Element\Template
{

    protected $filterBuilder;

    protected $productRepository;

    protected $searchCriteriaBuilder;

    protected $sortOrderBuilder;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\Api\SortOrderBuilder $sortOrderBuilder,
        \Magento\Framework\Api\FilterBuilder $filterBuilder,
        array $data = []
    ) {
        $this->filterBuilder = $filterBuilder;
        $this->productRepository = $productRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->sortOrderBuilder = $sortOrderBuilder;
        parent::__construct($context, $data);
    }

    public function getProductList()
    {
        // $sortOrder = $this->sortOrderBuilder
        //     ->setField('sku')
        //     ->setDescendingDirection()
        //     ->create();
        //
        // $searchCriteria = $this->searchCriteriaBuilder->addSortOrder($sortOrder)->create();
        //
        // return $this->productRepository->getList($searchCriteria)->getItems();

        $filter1 = $this->filterBuilder
            ->setField("sku")
            ->setValue("t%")
            ->setConditionType("like")
            ->create();

        $filter2 = $this->filterBuilder
            ->setField("sku")
            ->setValue("%t%")
            ->setConditionType("like")
            ->create();

        $sortOrder = $this->sortOrderBuilder
            ->setField('sku')
            ->setDescendingDirection()
            ->create();

        $searchCriteria = $this->searchCriteriaBuilder
        ->addFilters([$filter1])
        ->addFilters([$filter2])
        ->addSortOrder($sortOrder)
        ->setPageSize(6)
        ->create();

        return $this->productRepository->getList($searchCriteria)->getItems();
    }
}
