<?php

namespace Shellpea\CustomerList\Block;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $filterGroupBuilder;

    protected $customerRepository;

    protected $filterBuilder;

    protected $searchCriteriaBuilder;

    public function __construct(
        \Magento\Framework\Api\Search\FilterGroupBuilder $filterGroupBuilder,
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\Api\FilterBuilder $filterBuilder,
        array $data = []
    ) {
        $this->filterGroupBuilder = $filterGroupBuilder;
        $this->customerRepository = $customerRepository;
        $this->filterBuilder = $filterBuilder;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        parent::__construct($context, $data);
    }

    public function getCustomerList()
    {
        $filter1 = $this->filterBuilder
            ->setField("FirstName")
            ->setValue("A%")
            ->setConditionType("like")
            ->create();

        $filter2 = $this->filterBuilder
            ->setField("FirstName")
            ->setValue("S%")
            ->setConditionType("like")
            ->create();

        $filterGroup = $this->filterGroupBuilder
            ->setFilters([$filter1, $filter2])
            ->create();

        $searchCriteria = $this->searchCriteriaBuilder
        ->setFilterGroups([$filterGroup])
        ->create();

        return $this->customerRepository->getList($searchCriteria)->getItems();
    }
}
