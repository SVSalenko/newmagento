<?php

namespace Shellpea\Stores\Block;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $categoryFactory;

    protected $storeManager;

    public function __construct(
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $data = []
    ) {
        $this->_categoryFactory = $categoryFactory;
        $this->_storeManager = $storeManager;
        parent::__construct($context, $data);
    }

    public function getStoresName()
    {
        $result = [];

        foreach ($this->_storeManager->getStores() as $store) {
            $category = $this->_categoryFactory->create()->load($store->getRootCategoryId());
            $result[] = $store->getName() . ' - ' . $category->getName();
        }
        return $result;
    }
}
