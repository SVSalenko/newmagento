<?php

namespace Shellpea\Module\Plugin;

class BreadcrumbsPlugin

{
    public function beforeAddCrumb(\Magento\Theme\Block\Html\Breadcrumbs $subject, $crumbName, $crumbInfo)
		{
        $crumbInfo['label'] = $crumbInfo['label'] . '!';
        return [$crumbName, $crumbInfo];
    }
}
