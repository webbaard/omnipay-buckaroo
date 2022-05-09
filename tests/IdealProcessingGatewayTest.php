<?php

namespace Omnipay\Buckaroo;

use Omnipay\Buckaroo\Message\IdealProcessingPurchaseRequest;
use Omnipay\Tests\GatewayTestCase;

class IdealProcessingGatewayTest extends GatewayTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->gateway = new IdealProcessingGateway($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testPurchase()
    {
        $request = $this->gateway->purchase(['amount' => '10.00']);

        $this->assertInstanceOf(\Omnipay\Buckaroo\Message\IdealProcessingPurchaseRequest::class, $request);
        $this->assertSame('10.00', $request->getAmount());
    }

    public function testIdealIssuerChosen()
    {
        /** @var IdealProcessingPurchaseRequest $request */
        $request = $this->gateway->purchase([
            'amount' => '10.00',
            'returnUrl' => 'https://www.example.com/return',
            'issuer' => 'TRIONL2U',
        ]);

        $data = $request->getData();

        $this->assertSame('TRIONL2U', $data['Brq_service_idealprocessing_issuer']);
    }

    public function testIdealIssuerIsNotRequired()
    {
        /** @var IdealProcessingPurchaseRequest $request */
        $request = $this->gateway->purchase([
            'amount' => '10.00',
            'returnUrl' => 'https://www.example.com/return',
        ]);

        $this->assertNotContains('Brq_service_idealprocessing_issuer', $request->getData());
    }
}
