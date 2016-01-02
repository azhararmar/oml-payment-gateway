<?php
/**
 * Payment Processor
 *
 * @author Ibrahim Azhar Armar <azhar@iarmar.com>
 * @package Oml\PaymentGateway
 * @version 0.1
 */
namespace Oml\PaymentGateway\Processor;

use GuzzleHttp;

class Payment
{
	/**
	 * Instance of GuzzleHttp\Client
	 *
	 * @var object GuzzleHttp\Client
	 */
	protected $httpClient;

	/**
	 * Response received upon request
	 *
	 * @var object GuzzleHttp
	 */
	protected $httpResponse;

	/**
	 * Response received upon request
	 *
	 * @var object GuzzleHttp
	 */
	protected $httpBody;

	/**
	 * HTTP Response Content
	 *
	 * @var string
	 */
	protected $httpContent;

	/**
	 * HTTP Method for sending request
	 *
	 * @var string
	 */
	protected $httpMethod = 'POST';

	/**
	 * Instance of object implementing PaymentInterface
	 *
	 * @var object PaymentInterface
	 */
	protected $payment;

	/**
	 * Instance of object implementing PaymentInterface
	 */
	public function __construct(PaymentInterface $payment)
	{
		$this->payment = $payment;
	}

	/**
	 * Set HTTP Client for Request/Response
	 *
	 * @param $client GuzzleHttp\Client
	 * @return $this
	 */
	public function setHttpClient(GuzzleHttp\Client $client)
	{
		$this->httpClient = $client;
		return $this;
	}

	/**
	 * Get instance of GuzzleHttp\Client
	 *
	 * @return GuzzleHttp\Client
	 */
	public function getHttpClient()
	{
		return $this->httpClient;
	}

	/**
	 * Get Request Parameters
	 *
	 * @return array
	 */
	public function getParams()
	{
		return $this->payment->getParams();
	}

	/**
	 * Get API Endpoint
	 *
	 * @return string
	 */
	public function getApiEndpoint()
	{
		return $this->payment->getApiEndpoint();
	}

	/**
	 * Set HTTP Method (Allow POST & GET Request)
	 *
	 * @param string
	 * @return $this
	 */
	public function setMethod($method)
	{
		if (!in_array($method, array('POST', 'GET'))) {
			throw new \Exception('Invalid HTTP Method, only POST and GET are allowed');
		}
		$this->httpMethod = $method;
		return $this;
	}

	/**
	 * Get HTTP Method
	 *
	 * @return string
	 */
	public function getHttpMethod()
	{
		return $this->httpMethod;
	}

	/**
	 * Send API Request to Payment Processor
	 *
	 * @return GuzzleHttp\Client (Response Object)
	 */
	public function process()
	{
		$client = new GuzzleHttp\Client;
		$this->httpResponse = $client->request(
			$this->getHttpMethod(),
			$this->getApiEndpoint(),
			array('form_params' => $this->getParams())
		);
		$this->httpBody = $this->httpResponse->getBody();
		$this->httpContent = $this->httpBody->getContents();
		return $this->httpResponse;
	}

	/**
	 * Get HTTP Response
	 *
	 * @return GuzzleHttp\Client (Response Object)
	 */
	public function getHttpResponse()
	{
		return $this->httpResponse;
	}

	/**
	 * Get HTTP Body
	 *
	 * @return GuzzleHttp\Client (Response Object)
	 */
	public function getHttpBody()
	{
		return $this->httpBody;
	}

	/**
	 * Get HTTP Content
	 *
	 * @return string
	 */
	public function getHttpContent()
	{
		return $this->httpContent;
	}
}
