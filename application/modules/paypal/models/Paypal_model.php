<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Paypal Model
 *
 *
 * @package    	PopCMS - Login
 * @copyright  	Copyright (c) 2016 Horvath Mate & Csoma Gergo
 * @version    	1.0
 * @author     	Horvath Mate <horvath.mate@popularmarketing.hu>
 *              Csoma Gergo <csoma.gergo@popularmarketing.hu>
 *
 * Paypal model using Omnipay. 
 */
use Omnipay\Omnipay;
// ------------------------------------------------------------------------
class Paypal_model extends CI_Model  {

	function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->config('paypal_conf');
    }

    function configtest(){
        print_r($this->config->item('p_username'));
    }
    function initialize_gateway(){

        $gateway = Omnipay::create('PayPal_Express');
        // here we should place the email of the business sandbox account
        $gateway->setUsername($this->config->item('p_username')); 
        // here will be the password for the account
        $gateway->setPassword($this->config->item('p_password'));
        // and the signature for the account
        $gateway->setSignature($this->config->item('p_signature')); 
        // set it to true when you develop and when you go to production to false
        $gateway->setTestMode($this->config->item('testmode'));
        return $gateway;
    }

}

