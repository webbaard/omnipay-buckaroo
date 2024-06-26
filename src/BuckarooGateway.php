<?php

namespace Omnipay\Buckaroo;

use Omnipay\Common\AbstractGateway;

/**
 * Buckaroo Credit Card Gateway
 */
abstract class BuckarooGateway extends AbstractGateway
{
    public function getName()
    {
        return 'Buckaroo Gateway';
    }

    public function getDefaultParameters()
    {
        return [
            'websiteKey' => '',
            'secretKey' => '',
            'testMode' => false,
        ];
    }

    public function getWebsiteKey()
    {
        return $this->getParameter('websiteKey');
    }

    public function setWebsiteKey($value)
    {
        return $this->setParameter('websiteKey', $value);
    }

    public function getSecretKey()
    {
        return $this->getParameter('secretKey');
    }

    public function setSecretKey($value)
    {
        return $this->setParameter('secretKey', $value);
    }

    public function purchase(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Buckaroo\Message\PurchaseRequest', $parameters);
    }

    public function completePurchase(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Buckaroo\Message\CompletePurchaseRequest', $parameters);
    }
}
