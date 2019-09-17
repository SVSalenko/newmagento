<?php

namespace Shellpea\WriteHtml\Observer;

class WriteHtml implements \Magento\Framework\Event\ObserverInterface
{

  protected $logger;

  public function __construct(\Psr\Log\LoggerInterface $logger)
  {
      $this->logger = $logger;
  }

  public function execute(\Magento\Framework\Event\Observer $observer)
  {
    $response = $observer->getEvent()->getResponse();
    ob_start();
    echo $response."\n",FILE_APPEND;
    $html = ob_get_contents();
    ob_end_clean();
    $this->logger->info($html);
  }

}
