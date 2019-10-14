<?php

namespace Shellpea\PriorAttribut\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Eav\Setup\EavSetup;

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
            \Magento\Customer\Model\Customer::ENTITY,
            'priority_attribute',
            'is_system',
            0
        );
        $eavSetup->updateAttribute(
            \Magento\Customer\Model\Customer::ENTITY,
            'priority_attribute',
            'source_model',
            'Shellpea\PriorAttribut\Model\Customer\Attribute\Source\PriorAttribut'
        );
        $setup->endSetup();
    }
}
