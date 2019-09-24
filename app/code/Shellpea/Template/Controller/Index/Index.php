<?php

namespace Shellpea\Template\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
  protected $_layout;

  protected $_rawResultFactory;

  protected $_pageFactory;

  public function __construct(
    \Magento\Framework\Controller\Result\Raw $rawResultFactory,
    \Magento\Framework\View\LayoutFactory $layout,
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
    $this->_rawResultFactory = $rawResultFactory;
    $this->_layout = $layout;
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
    $block = $this->_layout->create()->createBlock('\Shellpea\Template\Block\Index')->setTemplate('Shellpea_Template::index.phtml')->toHtml();;
    return $this->_rawResultFactory->setContents($block);
	}
}
