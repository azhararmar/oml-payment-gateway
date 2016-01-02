Payment Processors
=============

#### Install using composer
```
composer.phar require azhararmar/oml-payment-gateway dev-master
```

#### Install using GIT
```
https://github.com/azhararmar/oml-payment-gateway.git
```


Paytronicks Configuration
-------------
1. Intialize Payment Object
```php
$cardPayment = new Oml\PaymentGateway\Paytronicks\CreditCard();
$cardPayment->fromArray(array(
	'key' => '123456789abcdefghijklmnopqrstuvwxyz',
	'payment' => 'single',
	'recurrence' => null,
	'amount' => '5000',
	'currency' => 'USD',
	'number' => '5105105105105100',
	'month' => 12,
	'year' => 2025,
	'cvv' => 123,
	'firstname' => 'Ibrahim',
	'lastname' => 'Azhar',
	'email' => 'john@doe.com',
	'phone' => '9999 999 999',
	'country' => 'in',
	'address' => 'BTM Layout, 2nd Stage',
	'city' => 'Bangalore',
	'state' => 'Karnataka',
	'zip' => '560046',
	'birth' => '1972-04-25',
	'ip' => '123.231.4.56',
	'order' => '123'
));
```
2. Process payment
```php
$payment = new Oml\PaymentGateway\Processor\Payment($cardPayment);
$payment->setHttpClient(new \GuzzleHttp\Client);
$payment->process();
```

3. Get Response
```php
$httpContent = $payment->getHttpContent();
```
