<?php

namespace Shellpea\Module\Plugin;

class PriceChangePlugin
{
		public function afterGetPrice(\Magento\Catalog\Api\Data\ProductInterface $subject, $result)
		{
			return  22;
		}
}
