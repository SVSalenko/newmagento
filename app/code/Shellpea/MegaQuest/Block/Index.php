<?php

namespace Shellpea\MegaQuest\Block;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $employeRepository;

    protected $filterBuilder;

    protected $searchCriteriaBuilder;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Shellpea\MegaQuest\Api\EmployeRepositoryInterface $employeRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\Api\FilterBuilder $filterBuilder,
        array $data = []
    ) {
        $this->employeRepository = $employeRepository;
        $this->filterBuilder = $filterBuilder;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        parent::__construct($context, $data);
    }

    public function getNameList()
    {
        $filter = $this->filterBuilder
            ->setField("Name")
            ->setValue("A%")
            ->setConditionType("like")
            ->create();

        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilters([$filter])
            ->create();

        return $this->employeRepository->getList($searchCriteria)->getItems();
    }
}
