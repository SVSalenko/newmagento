<?php

namespace Shellpea\DB\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;

class MyPatch implements DataPatchInterface
{
    private $moduleDataSetup;

    public function __construct(
        \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    public function apply()
    {
        $this->moduleDataSetup->getConnection()->insert(
            $this->moduleDataSetup->getTable('my_first_table'),
            [
                'title' => 'hello'
            ]
        );
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }
}
