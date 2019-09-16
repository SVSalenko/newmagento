<?php

namespace Shellpea\Event\Observer;

class Event implements \Magento\Framework\Event\ObserverInterface
{

  protected $logger;

  public function __construct(\Psr\Log\LoggerInterface $logger)
  {
      $this->logger = $logger;
  }

  public function execute(\Magento\Framework\Event\Observer $observer)
  {
    $request = $observer->getEvent()->getRequest();
    $url = $request->getPathInfo();
    $url = "URL: " . $url;
    //file_put_contents(BP.'/var/log/test.log', $url."\n",FILE_APPEND);
    $this->logger->info($url);
  }

}
