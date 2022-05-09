<?php

namespace Omnipay\Buckaroo;

use Omnipay\Buckaroo\Message\IdealPurchaseRequest;
use Omnipay\Tests\GatewayTestCase;

class SepaDirectDebitGatewayTest extends GatewayTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->gateway = new SepaDirectDebitGateway($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testPurchase()
    {
        $request = $this->gateway->purchase(['amount' => '10.00']);

        $this->assertInstanceOf(\Omnipay\Buckaroo\Message\SepaDirectDebitPurchaseRequest::class, $request);
        $this->assertSame('10.00', $request->getAmount());
    }
}
