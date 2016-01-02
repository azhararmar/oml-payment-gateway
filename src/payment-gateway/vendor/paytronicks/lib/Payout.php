<?php
/**
 * Payout Class
 * Handle Paytronicks Payout Request
 *
 * @author Ibrahim Azhar Armar <azhar@iarmar.com>
 * @package Oml\PaymentGateway\Paytronicks
 * @version 0.1
 */
namespace Oml\PaymentGateway\Paytronicks;

use Oml\PaymentGateway\Processor\PaymentInterface;

class Payout extends Paytronicks implements PaymentInterface
{
	/**
	 * API end-point for processing credit card payment
	 *
	 * @var string
	 * @required true
	 */
	const API_ENDPOINT = 'https://paytronicks.com/wallet/api/pay';

	/**
	 * API Key
	 *
	 * @var string
	 * @required true
	 */
	protected $key;

	/**
	 * Recepients email address (100 characters)
	 *
	 * @var string
	 * @example (azhar@iarmar.com)
	 * @default null
	 * @required true
	 */
	protected $recipient;

	/**
	 * Amount with 2 decimal places
	 *
	 * @var decimal
	 * @example (50.00)
	 * @default null
	 * @required true
	 */
	protected $amount;

	/**
	 * Currency code (3 characters)
	 *
	 * @var string
	 * @example (USD, CAD, EUR, GBP)
	 * @default USD
	 * @required false
	 */
	protected $currency;

	/**
	 * Message to recipient (255 characters)
	 *
	 * @var string
	 * @default null
	 * @required false
	 */
	protected $message;

	/**
	 * Order number specified by you (100 characters)
	 *
	 * @var string
	 * @example (1)
	 * @default null
	 * @required false
	 */
	protected $order;

	/**
	 * Validate Payout Input
	 *
	 * @return boolean
	 */
	public function isValid()
	{
		return true;
	}
}
