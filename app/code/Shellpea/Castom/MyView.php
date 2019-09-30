<?php

namespace Shellpea\Castom;

use Magento\Catalog\Controller\Product\View;

use Magento\Framework\App\Action\HttpPostActionInterface as HttpPostActionInterface;
use Magento\Framework\App\Action\HttpGetActionInterface as HttpGetActionInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Catalog\Controller\Product as ProductAction;

class MyView extends View
{
  protected $_rawResultFactory;

  public function __construct(
      \Magento\Framework\Controller\Result\Raw $rawResultFactory,
      Context $context,
      \Magento\Catalog\Helper\Product\View $viewHelper,
      \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory,
      PageFactory $resultPageFactory
  ) {
      $this->_rawResultFactory = $rawResultFactory;
      $this->viewHelper = $viewHelper;
      $this->resultForwardFactory = $resultForwardFactory;
      $this->resultPageFactory = $resultPageFactory;
      parent::__construct($context, $viewHelper, $resultForwardFactory, $resultPageFactory);
  }

  public function execute()
  {
  return $this->_rawResultFactory->setContents('Hello');
  }
}
