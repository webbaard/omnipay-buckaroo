<?php

namespace Omnipay\Buckaroo;

use Omnipay\Tests\GatewayTestCase;

class BuckarooGatewayTest extends GatewayTestCase
{
    /**
     * @var BuckarooGateway
     */
    protected $gateway;

    public function setUp(): void
    {
        parent::setUp();

        $this->gateway = $this->getMockForAbstractClass(BuckarooGateway::class, [$this->getHttpClient(), $this->getHttpRequest()]);
    }

    public function testPurchase()
    {
        $request = $this->gateway->purchase(['amount' => '10.00']);

        $this->assertInstanceOf(\Omnipay\Buckaroo\Message\PurchaseRequest::class, $request);
        $this->assertSame('10.00', $request->getAmount());
    }
}
