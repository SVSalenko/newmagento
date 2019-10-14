<?php

namespace Shellpea\MegaQuest\Model\ResourceModel;

class Employe extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('employees_of_our_company', 'entity_id');
    }
}
