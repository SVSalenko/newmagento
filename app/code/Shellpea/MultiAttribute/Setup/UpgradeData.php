<?php

namespace Shellpea\MultiAttribute\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Eav\Setup\EavSetupFactory;

class UpgradeData implements UpgradeDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

            $eavSetup->updateAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                'multiselect_attribute',
                'is_html_allowed_on_front',
                true
            );

            $eavSetup->updateAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                'multiselect_attribute',
                'is_visible_on_front',
                true
            );



            $eavSetup->updateAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                'multiselect_attribute',
                'frontend_model',
                'Shellpea\MultiAttribute\Model\Attribute\Frontend\MultiAttribute'
            );

        $setup->endSetup();
    }
}
