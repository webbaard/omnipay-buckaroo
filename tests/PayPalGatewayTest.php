<?php

namespace Omnipay\Buckaroo;

use Omnipay\Tests\GatewayTestCase;

class PayPalGatewayTest extends GatewayTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->gateway = new PayPalGateway($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testPurchase()
    {
        $request = $this->gateway->purchase(['amount' => '10.00']);

        $this->assertInstanceOf(\Omnipay\Buckaroo\Message\PayPalPurchaseRequest::class, $request);
        $this->assertSame('10.00', $request->getAmount());
    }
}
