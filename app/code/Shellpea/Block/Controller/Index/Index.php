<?php

namespace Shellpea\Block\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
  protected $_pageFactory;

  protected $_layout;

  protected $_rawResultFactory;

  public function __construct(
    \Magento\Framework\Controller\Result\Raw $rawResultFactory,
    \Magento\Framework\View\LayoutFactory $layout,
    \Magento\Framework\App\Action\Context $context,
    \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
      $this->_rawResultFactory = $rawResultFactory;
      $this->_layout = $layout;
      $this->_pageFactory = $pageFactory;
      return parent::__construct($context);
    }

  public function execute()
  {
    // $block = $this->_layout->create()->createBlock('\Shellpea\Block\Block\Index')->toHtml();
    $block = $this->_layout->create()->createBlock('Magento\Framework\View\Element\Text')->setText('Hello World')->toHtml();
    return $this->_rawResultFactory->setContents($block);
  }
}
