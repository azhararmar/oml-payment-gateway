<?php
/**
 * Paytronics Abstract Class
 *
 * @author Ibrahim Azhar Armar <azhar@iarmar.com>
 * @package Oml\PaymentGateway\Paytronicks
 * @version 0.1
 */
namespace Oml\PaymentGateway\Paytronicks;

use Oml\PaymentGateway\Paytronicks\ApiService;

abstract class Paytronicks
{
	/**
	 * Accessor (Setter/Getter)
	 *
	 * @param string $name (method name with set/get)
	 * @param string $value (method value with set/get)
	 * @return $this
	 */
	public function __call($name, $value)
	{
		$isSetter = substr($name, 0, 3) == 'set' ? true : false;
		$name = strtolower(substr($name, -3));
		if(false === $isSetter && property_exists($this, $name)) {
			return $this->$name;
		}
		if (true === $isSetter && property_exists($this, $name)) {
			$this->$name = is_array($value) && array_key_exists(0, $value) ? $value[0] : null;
		}
		return $this;
	}

	/**
	 * Import properties from array
	 *
	 * @param array $properties
	 * @return $this
	 */
	public function fromArray(array $properties)
	{
		foreach ($properties as $key => $value) {
			if(property_exists($this, $key)) {
				$this->$key = $value;
			}
		}
		return $this;
	}

	/**
	 * Export class property to array
	 *
	 * @return array
	 */
	public function toArray()
	{
		return get_object_vars($this);
	}

	/**
	 * Get API Endpoint
	 *
	 * @return string
	 */
	public function getApiEndpoint()
	{
		return static::API_ENDPOINT;
	}

	/**
	 * Get Request Parameters
	 *
	 * @return array
	 */
	public function getParams()
	{
		return $this->toArray();
	}
}
