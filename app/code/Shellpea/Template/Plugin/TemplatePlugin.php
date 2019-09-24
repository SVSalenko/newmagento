<?php

namespace Shellpea\Template\Plugin;

class TemplatePlugin

{
    public function beforeSetTemplate(\Magento\Catalog\Block\Product\View\Description $subject, $template)
		{
        $template = 'Shellpea_Template::index.phtml';
        return $template;
    }
}
