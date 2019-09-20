<?php

namespace Shellpea\HelloWorld\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{

  protected $_rawResultFactory;

  protected $_resultRedirectFactory;

	public function __construct(
    \Magento\Framework\Controller\Result\Redirect $resultRedirectFactory,
    \Magento\Framework\Controller\Result\Raw $rawResultFactory,
		\Magento\Framework\App\Action\Context $context)
	{
    $this->_resultRedirectFactory = $resultRedirectFactory;
    $this->_rawResultFactory = $rawResultFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
     // return $this->_rawResultFactory->setContents('Hello World');
     return $this->_resultRedirectFactory->setPath('/');
  }
}
