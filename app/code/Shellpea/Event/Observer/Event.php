<?php

namespace Shellpea\Event\Observer;

class Event implements \Magento\Framework\Event\ObserverInterface
{

  public function execute(\Magento\Framework\Event\Observer $observer)
  {
    $request = $observer->getEvent()->getRequest();
    $url = $request->getPathInfo();
    file_put_contents(BP.'/var/log/test.log', $url."\n",FILE_APPEND);
  }

}
