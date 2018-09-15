<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
|--------------------------------------------------------------------------
| Paypal gateway base config for omnipay
|--------------------------------------------------------------------------
*/
/*
|--------------------------------------------------------------------------
| 	Credentials for the paypal api wich you can get at
|	https://developer.paypal.com/developer/accounts 
|
|	username 
|	password 
|	signature
|	testmode: set it to true when you develop and when you go to production to false
|--------------------------------------------------------------------------
*/
$config['p_username'] = 'mt.hrvth_api1.gmail.com';
$config['p_password'] = 'N8Q8R28TTWJMF3D8';
$config['p_signature'] = 'AFcWxV21C7fd0v3bYYYRCpSSRl31AvdBS649LDF54LfGlUjqjUR4Ym.e';
$config['testmode'] = 'false';