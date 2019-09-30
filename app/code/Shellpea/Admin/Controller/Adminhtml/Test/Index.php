<?php

namespace Shellpea\Admin\Controller\Adminhtml\Test;

class Index extends \Magento\Backend\App\AbstractAction
{
  protected $_publicActions = ['index'];

  protected $_rawResultFactory;

  public function __construct(
    \Magento\Backend\App\Action\Context $context,
    \Magento\Framework\Controller\Result\Raw $rawResultFactory
    )
    {
      $this->_rawResultFactory = $rawResultFactory;
      return parent::__construct($context);
    }

  protected function _isAllowed()
  {
    $param = $this->_request->getParam('secret');
    If(!($param == 1)){
    return false;
    } return parent::_isAllowed();
  }

  public function execute()
  {
    return $this->_rawResultFactory->setContents('Welcome to my Admin Controller!');
  }
}
