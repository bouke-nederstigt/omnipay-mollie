<?php

namespace Omnipay\Mollie\Message;

use Omnipay\Tests\TestCase;

class RevokeCustomerMandateRequestTest extends TestCase
{

    /**
     *
     * @var \Omnipay\Mollie\Message\RevokeCustomerMandateRequest
     */
    protected $request;

    public function setUp()
    {
        $this->request = new RevokeCustomerMandateRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->initialize(
            array(
                'apiKey' => 'mykey',
                'customerId' => 'cst_stTC2WHAuS',
                'id' => 'mdt_pWUnw6pkBN'
            )
        );
    }

    public function testGetData()
    {
        $data = $this->request->getData();

        $this->assertCount(0, $data);
    }

    public function testGetDataWithoutCustomerId()
    {
        $data = $this->request->getData();

        $this->assertCount(0, $data);
    }

    public function testGetDataWithoutId()
    {
        $data = $this->request->getData();

        $this->assertCount(0, $data);
    }

    public function testSendSuccess()
    {
        $response = $this->request->send();

        $this->assertInstanceOf('Omnipay\Mollie\Message\RevokeCustomerMandateResponse', $response);
        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());

    }
}
