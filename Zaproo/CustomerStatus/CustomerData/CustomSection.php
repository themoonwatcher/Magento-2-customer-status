<?php
namespace Zaproo\CustomerStatus\CustomerData;
use Magento\Customer\CustomerData\SectionSourceInterface;

class CustomSection implements SectionSourceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getSectionData()
    {

      $objectManager =  \Magento\Framework\App\ObjectManager::getInstance();
      $customerSession = $objectManager->get('Magento\Customer\Model\Session');

      if($customerSession->isLoggedIn()) {
        return ['msg' => $customerSession->getCustomer()->getCustomerStatus()];
      } else {
        return ['msg' => ''];
      }
    }
}
