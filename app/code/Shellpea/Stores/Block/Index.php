<?php

namespace Shellpea\Stores\Block;

use Magento\Framework\App\ObjectManager;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $storeManager;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $data = []
    ) {
        $this->_storeManager = $storeManager;
        parent::__construct($context, $data);
    }

    public function getStoresName()
    {
        $result = [];
        $_objectManager = ObjectManager::getInstance();

        foreach ($this->_storeManager->getStores() as $store) {
            $category = $_objectManager->create('Magento\Catalog\Model\Category')->load($store->getRootCategoryId());
            $result[] = $store->getName() . ' - ' . $category->getName();
        }
        return $result;
    }
}
