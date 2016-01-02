<?php
/**
 * Payment Processor Interface
 *
 * @author Ibrahim Azhar Armar <azhar@iarmar.com>
 * @package Oml\PaymentGateway
 * @version 0.1
 */
namespace Oml\PaymentGateway\Processor;

interface PaymentInterface
{
	/**
	 * API Endpoint (Required for sending request)
	 *
	 * @return string
	 */
	public function getApiEndPoint();

	/**
	 * Request Params (Required for sending request)
	 *
	 * @return array
	 */
	public function getParams();

	/**
	 * Validate if anything
	 *
	 * @return boolean
	 */
	public function isValid();
}
