<?php

namespace Shellpea\LogSaveProduct\Observer;

class LogSaveProduct implements \Magento\Framework\Event\ObserverInterface
{
    protected $logger;

    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $product = $observer->getEvent()->getProduct()->getData();
        $productOrig = $observer->getEvent()->getProduct()->getOrigData();

        $array1 = json_decode(json_encode($productOrig), true);
        $array2 = json_decode(json_encode($product), true);

        function makeSingleArray($arr)
        {
            if (!is_array($arr)) return false;
            $tmp = array();

            foreach ($arr as $val) {
                if (is_array($val)) {
                    $tmp = array_merge($tmp, makeSingleArray($val));
                } else {
                    $tmp[] = $val;
                }
            }
            return $tmp;
        }

        $arrOut1 = makeSingleArray($array1);
        $arrOut2 = makeSingleArray($array2);

        $update = array_diff($arrOut2, $arrOut1);

        foreach ($update as $key => $value) {
            if ($value != null) {
                $this->logger->info($value);
            }
        }
    }
}
