<?php
/**
 * CreditCard Class
 * Handle Paytronicks Credit Card Processing Request
 *
 * @author Ibrahim Azhar Armar <azhar@iarmar.com>
 * @package Oml\PaymentGateway\Paytronicks
 * @version 0.1
 */
namespace Oml\PaymentGateway\Paytronicks;

use Oml\PaymentGateway\Processor\PaymentInterface;

class CreditCard extends Paytronicks implements PaymentInterface
{
	/**
	 * API end-point for processing credit card payment
	 *
	 * @var string
	 * @required true
	 */
	const API_ENDPOINT = 'https://paytronicks.com/wallet/api/cc';

	/**
	 * API Key
	 *
	 * @var string
	 * @required true
	 */
	protected $key;

	/**
	 * PaymentType (Single or Subscription)
	 *
	 * @var string
	 * @example (single, subscription)
	 * @default single
	 * @required true
	 */
	protected $payment;

	/**
	 * Subscription recurrence type (Required only if payment type is subscription)
	 *
	 * @var string
	 * @example (weekly, biweekly, monthly, quarterly, annually)
	 * @default null
	 * @required false (required if payment is subscription)
	 */
	protected $recurrence;

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
	 * Credit card number
	 *
	 * @var string
	 * @example 5105105105105100
	 * @default null
	 * @required true
	 */
	protected $number;

	/**
	 * Credit card expiry month (1 to 12 with no leading zeroes)
	 *
	 * @var integer
	 * @example (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12)
	 * @default null
	 * @required true
	 */
	protected $month;

	/**
	 * Credit card expiry year (2 digits)
	 *
	 * @var integer
	 * @example (15, 16, 17, 18, 19, 20)
	 * @default null
	 * @required true
	 */
	protected $year;

	/**
	 * Credit card security code (3 to 4 digits)
	 *
	 * @var integer
	 * @example (123, 6324, 291)
	 * @default null
	 * @required true
	 */
	protected $cvv;

	/**
	 * Cardholder's first name (100 characters max)
	 *
	 * @var string
	 * @example (Ibrahim, Ameer)
	 * @default null
	 * @required true
	 */
	protected $firstname;

	/**
	 * Cardholder's last name (100 characters max)
	 *
	 * @var string
	 * @example (Armar, Mohtesham)
	 * @default null
	 * @required true
	 */
	protected $lastname;

	/**
	 * Cardholder's Email address (100 characters max)
	 *
	 * @var string
	 * @example (azhar@iarmar.com)
	 * @default null
	 * @required true
	 */
	protected $email;

	/**
	 * Cardholder's phone number (20 characters max)
	 *
	 * @var string
	 * @example (0091 9916 000 111)
	 * @default null
	 * @required true
	 */
	protected $phone;

	/**
	 * Cardholder's country of residence (2 letter code)
	 *
	 * @var string
	 * @example (in, us, ca)
	 * @default null
	 * @required true
	 */
	protected $country;

	/**
	 * Cardholder's address 1 (255 characters max)
	 *
	 * @var string
	 * @example (Benson town, Bangalore)
	 * @default null
	 * @required true
	 */
	protected $address;

	/**
	 * Cardholder's address 2 (255 characters max)
	 *
	 * @var string
	 * @example (Benson town, Bangalore)
	 * @default null
	 * @required false
	 */
	protected $address2;

	/**
	 * Cardholder's city of residence (50 characters max)
	 *
	 * @var string
	 * @example (Bangalore)
	 * @default null
	 * @required true
	 */
	protected $city;

	/**
	 * Cardholder's state/province/region of residence (USA/Canada: 2 characters, Other: 20 characters)
	 * (Required for US or Canadian customers)
	 * 
	 * @var string
	 * @example (Karnataka)
	 * @default null
	 * @required false (Required for US or Canadian customers)
	 */
	protected $state;

	/**
	 * Cardholder's ZIP or Postal Code (10 characters)
	 * (Required for US or Canadian customers)
	 *
	 * @var string
	 * @example (95124)
	 * @default null
	 * @required false (Required for US or Canadian customers)
	 */
	protected $zip;

	/**
	 * Cardholder's birth date (YYYY-MM-DD)
	 *
	 * @var string
	 * @example (1970-12-01)
	 * @default null
	 * @required true
	 */
	protected $birth;

	/**
	 * IPv4 address of Customer
	 *
	 * @var string
	 * @example (123.456.789.111)
	 * @default null
	 * @required true
	 */
	protected $ip;

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
	 * Validate Credit Card Input
	 *
	 * @return boolean
	 */
	public function isValid()
	{
		return true;
	}
}
