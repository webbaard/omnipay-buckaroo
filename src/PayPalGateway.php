<?php

namespace Omnipay\Buckaroo;

/**
 * Buckaroo PayPal Gateway
 */
class PayPalGateway extends BuckarooGateway
{
    public function getName()
    {
        return 'Buckaroo PayPal';
    }

    public function purchase(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Buckaroo\Message\PayPalPurchaseRequest', $parameters);
    }
}
