<?php

namespace Shellpea\MegaQuest\Setup\Patch\Data;

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
        $this->moduleDataSetup->getConnection()->insertMultiple(
            $this->moduleDataSetup->getTable('employees_of_our_company'),
            [
                [
                    'name' => 'Sergey',
                ],
                [
                    'name' => 'Valentin',
                ],
                [
                    'name' => 'Dmitriy',
                ],
                [
                    'name' => 'Alex',
                ],
                [
                    'name' => 'Aleksandr',
                ],
                [
                    'name' => 'Stesha',
                ],
                [
                    'name' => 'Igor',
                ]
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
