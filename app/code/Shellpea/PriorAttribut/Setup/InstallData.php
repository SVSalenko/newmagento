<?php

namespace Shellpea\PriorAttribut\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Model\Config;
use Magento\Customer\Model\Customer;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;
    public function __construct(EavSetupFactory $eavSetupFactory, Config $eavConfig)
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavConfig = $eavConfig;
    }
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(
            \Magento\Customer\Model\Customer::ENTITY,
            'priority_attribute',
            [
                'type' => 'int',
                'label' => 'Priority Atrribute',
                'input' => 'select',
                'backend_type' => 'int',
                'frontend_type' => 'select',
                'required' => false,
                'is_system' => 0,
                'source_model' => 'Shellpea\PriorAttribut\Model\Customer\Attribute\Source\PriorAttribut',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
            ]
        );
        $attribute = $this->eavConfig->getAttribute(Customer::ENTITY, 'priority_attribute');
        $attribute->setData(
            'used_in_forms',
            ['adminhtml_customer']
        );
        $attribute->save();
    }
}
