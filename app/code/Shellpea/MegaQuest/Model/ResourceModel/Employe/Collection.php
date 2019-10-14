<?php

namespace Shellpea\MegaQuest\Model\ResourceModel\Employe;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Shellpea\MegaQuest\Model\Employe', 'Shellpea\MegaQuest\Model\ResourceModel\Employe');
    }
}
