<?php

namespace Omnipay\Mollie\Message;

use Omnipay\Common\Http\ResponseParser;

/**
 * Mollie Revoke Customer Mandate Request
 * https://www.mollie.com/nl/docs/reference/mandates/delete
 *
 * @method \Omnipay\Mollie\Message\FetchPaymentMethodsResponse send()
 */
class RevokeCustomerMandateRequest extends AbstractRequest
{
    /**
     * @return string
     */
    public function getCustomerId()
    {
        return $this->getParameter('customerId');
    }

    /**
     * @param $value
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setCustomerId($value)
    {
        return $this->setParameter('customerId', $value);
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->getParameter('id');
    }

    /**
     * @param $value
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setId($value)
    {
        return $this->setParameter('id', $value);
    }

    /**
     * @return array
     */
    public function getData()
    {
        $this->validate('apiKey', 'customerId', 'id');

        return array();
    }

    /**
     * @param mixed $data
     * @return RevokeCustomerMandateResponse
     */
    public function sendData($data)
    {
        $httpResponse = $this->sendRequest("DELETE", "/customers/{$this->getCustomerId()}/mandates/{$this->getId()}");

        return $this->response = new RevokeCustomerMandateResponse($this, ResponseParser::json($httpResponse));
    }
}
