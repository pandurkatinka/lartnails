<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Omnipay\Omnipay;
class Paypal extends MX_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('Paypal_model');
    }

	public function index()
	{
		$this->Paypal_model->configtest();
	}

	public function postPayment ()
    {
        $price = number_format($this->session->cart->getTotalPrice(),2,'.','');
        //print_r($price);exit;
        $params = array(
            'cancelUrl' => base_url('paypal/index'),
            'returnUrl' => base_url('paypal/response'),
            'currency' => 'HUF',
            'amount' => $price,
        );
        //we save the parameters to session
        $this->session->paypalParams = $params;

        //we initialize the Paypal Gateway with our config in the paypal_conf.php
        
        $gateway = $this->Paypal_model->initialize_gateway();
        $items = array();

        foreach ($this->session->cart->getItems() as $value) {
            array_push($items, $item = array(   'name' => $value['item']->getName(),
                                                'quantity' => $value['qty'],
                                                'price' => $value['item']->getPrice()));    
        }
        //$gateway->setItems($items);
        $response = $gateway->purchase($params)->setItems($items)->send(); // here you send details to PayPal

        if ($response->isRedirect()) {
            // redirect to offsite payment gateway
            $response->redirect();
        }
        else {
            // payment failed: display message to customer
            echo $response->getMessage();
        }
    }

    public function response ()
    {

	   	$gateway = $this->Paypal_model->initialize_gateway();
	    // load request data from session
	    $params = $this->session->paypalParams;
	    $params['token'] = $this->input->get('token');
	    $params['PayerID'] = $this->input->get('PayerID');
	    $params['clientIp'] = $this->input->ip_address();
	    $response = $gateway->completePurchase($params)->send();
	    $data['reference'] = $response->getTransactionReference();
        
        if($response->isSuccessful()){

                $name = $this->session->order['name'];
                $email = $this->session->order['email'];
                $email_body = $this->session->order['content'];
                $email_body .= '<br>Tranzakciós szám:' . $data['reference'];
                $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://w1.cpserver.net',
                    'smtp_port' => 465,
                    'smtp_user' => 'noreply@popularmarketing.hu',
                    'smtp_pass' => '0O4*p[0O~o*Q',
                    'mailtype'  => 'html',
                );

                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from($email);
                $this->email->to('rendeles.babycontrol@gmail.com');
                //$this->email->cc($email);
                $this->email->subject('Babycontrol.hu - Paypal fizetés');
                $this->email->message($email_body);

                if($this->email->send()){
                    $data['mailmsg'] = 'Az emailt elküldtük! Köszönjük!';
                }else{
                    $data['mailmsg'] = 'Hiba történt';
                };
            $this->load->viewfront('confirmed', $data);
        }else{
            print_r($response);    
        }
	     

    }
}
