<?php
namespace Shellpea\MegaQuest\Api;

use \Magento\Framework\Api\SearchCriteriaInterface;

interface EmployeRepositoryInterface
{
    public function getList(SearchCriteriaInterface $criteria);
}
