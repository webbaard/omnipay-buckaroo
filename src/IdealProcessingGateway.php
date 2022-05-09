<?php

namespace Omnipay\Buckaroo;

/**
 * Buckaroo iDeal Processing Gateway
 */
class IdealProcessingGateway extends BuckarooGateway
{
    public function getName()
    {
        return 'Buckaroo iDeal Processing';
    }

    public function purchase(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Buckaroo\Message\IdealProcessingPurchaseRequest', $parameters);
    }
}
