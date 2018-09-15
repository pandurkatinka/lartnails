<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Shop extends MX_Controller {

    protected $cart;
    /*  Shop constructor
    *   
    */
    function __construct() {
        parent::__construct();
        $this->load->library('cart');
        $this->load->library('item');
        $this->load->model('Shop_model');

        //TODO: drop it in the shop_model class / initialize cart 
        if(isset($this->session->cart)){
            $this->cart = $this->session->cart;
        }
        else{
            $this->session->cart = new Cart();
        }


    }

    public function index(){
        $data['cart'] = $this->session->cart;   
        //$this->load->view('cart', $data, FALSE);
    }
    public function checkout(){
        $data['cart'] = $this->session->cart;
        // Letoltjuk az xml-t ami az arfolyamokat tartalmazza
        $xmlstring = file_get_contents('http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');
        
        // Az xml-t elobb atalakitjuk json-ba, majd json-bol egy tombbe konvertaljuk
        $xml = simplexml_load_string($xmlstring);
        $json = json_encode($xml);
        $data['xmlarray'] = json_decode($json,TRUE);

        // vegigmegyunk a tombbon
        $data['exchangerate'] = null;
        foreach ($data['xmlarray']['Cube']['Cube']['Cube'] as $value) {
            // es kivesszuk belole a forintra vonatkozo arfolyamot
            if($value['@attributes']['currency'] == 'HUF') $data['exchangerate'] = $value['@attributes']['rate'];
        }
        // atvaltjuk az eurobol forintra vonatkozo arfolyamot forintrol euroba
        $data['exchangerate'] = 1/$data['exchangerate'];
        $this->load->viewfront('checkout', $data, FALSE);
    }

    public function checkoutpaypal(){
        $data['cart'] = $this->session->cart;
        // Letoltjuk az xml-t ami az arfolyamokat tartalmazza
        $xmlstring = file_get_contents('http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');
        
        // Az xml-t elobb atalakitjuk json-ba, majd json-bol egy tombbe konvertaljuk
        $xml = simplexml_load_string($xmlstring);
        $json = json_encode($xml);
        $data['xmlarray'] = json_decode($json,TRUE);

        // vegigmegyunk a tombbon
        $data['exchangerate'] = null;
        foreach ($data['xmlarray']['Cube']['Cube']['Cube'] as $value) {
            // es kivesszuk belole a forintra vonatkozo arfolyamot
            if($value['@attributes']['currency'] == 'HUF') $data['exchangerate'] = $value['@attributes']['rate'];
        }
        // atvaltjuk az eurobol forintra vonatkozo arfolyamot forintrol euroba
        $data['exchangerate'] = 1/$data['exchangerate'];
        $this->load->viewfront('checkoutpaypal', $data, FALSE);
    }

    public function codOrder(){
        $this->load->library('recaptcha');

        $recaptcha = $this->input->post('g-recaptcha-response');
        if (!empty($recaptcha) && isset($recaptcha)) {
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (isset($response['success']) and $response['success'] === true) {

                $name = $this->input->post('name');
                $email = $this->input->post('email');
                /*
                $phone = $this->input->post('phone');
                $user_postcode = $this->input->post('user_postcode');
                $user_varos = $this->input->post('user_varos');
                $user_cim = $this->input->post('user_cim');

                $szamla_nev = $this->input->post('szamla_nev');
                $szamla_cim = $this->input->post('szamla_cim');
                $user_cim = $this->input->post('user_cim');

                $eg_nev = $this->input->post('eg_nev');
                $eg_cim = $this->input->post('eg_cim');
                $egpt_nev = $this->input->post('egpt_nev');
                $egpt_azon = $this->input->post('egpt_azon');
                */
                
                $subject = 'Babycontrol.hu rendelés';
                $email_body = "";

                foreach ($this->input->post() as $key => $value) {
                    if($key != "g-recaptcha-response")
                    $email_body .=  $key.": ".$value."<br/>";
                }

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
                $this->email->subject($subject);
                $this->email->message($email_body);

                if($this->email->send()){
                    echo json_encode(array("status"=> "ok","message" => 'Az emailt elküldtük! Köszönjük!'));
                }else{
                    echo json_encode (array("status"=> "error","message" => 'Hiba történt, próbálja meg újra!'));
                };
            } else { echo json_encode (array("status"=> "error","message" => 'Kérem helyesen töltse ki a recaptchát'));} 
        }else { echo json_encode (array("status"=> "error","message" => 'Töltse ki a recaptchát'));}

        //$this->load->view('cart', $data, FALSE);
    }

    public function paypalOrder(){
        $this->load->library('recaptcha');

        $recaptcha = $this->input->post('g-recaptcha-response');
        if (!empty($recaptcha) && isset($recaptcha)) {
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (isset($response['success']) and $response['success'] === true) {

                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $subject = 'Babycontrol.hu rendelés';
                $email_body = "";

                foreach ($this->input->post() as $key => $value) {
                    if($key != "g-recaptcha-response")
                    $email_body .=  $key.": ".$value."<br/>";
                }
                $order = array('name' => $name, 'email' => $email, 'name' => $name, 'content' => $email_body);
                $this->session->set_userdata('order', $order);
                
                echo json_encode(array("status"=> "ok","message" => 'postPayment'));
            } else { echo json_encode (array("status"=> "error","message" => 'Kérem helyesen töltse ki a recaptchát'));} 
        }else { echo json_encode (array("status"=> "error","message" => 'Töltse ki a recaptchát'));}

        //$this->load->view('cart', $data, FALSE);
    }

    public function cart(){
        $data['cart'] = $this->session->cart;
        $this->load->viewfront('shop', $data);
    }
    public function updateCart(){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept"); 
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        $data['cart'] = $this->session->cart;
        echo $this->load->view('cart', $data, TRUE);
    }
    
    public function updateShoppingCart(){
        $data['cart'] = $this->session->cart;
        // Letoltjuk az xml-t ami az arfolyamokat tartalmazza
        $xmlstring = file_get_contents('http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');
        
        // Az xml-t elobb atalakitjuk json-ba, majd json-bol egy tombbe konvertaljuk
        $xml = simplexml_load_string($xmlstring);
        $json = json_encode($xml);
        $data['xmlarray'] = json_decode($json,TRUE);

        // vegigmegyunk a tombbon
        $data['exchangerate'] = null;
        foreach ($data['xmlarray']['Cube']['Cube']['Cube'] as $value) {
            // es kivesszuk belole a forintra vonatkozo arfolyamot
            if($value['@attributes']['currency'] == 'HUF') $data['exchangerate'] = $value['@attributes']['rate'];
        }
        // atvaltjuk az eurobol forintra vonatkozo arfolyamot forintrol euroba
        $data['exchangerate'] = 1/$data['exchangerate'];
        echo $this->load->view('shoppingcart', $data, TRUE);
    }

    public function removequantity(){
        $id = $this->input->post('id');
        $item = $this->session->cart->items[$id]['item'];
        $this->session->cart->removeItemQty($item);
    }


    public function delete_cart(){
        $this->session->unset_userdata('cart');
    }
    public function delFromCart(){
        $id = $this->input->post('id');
        $this->session->cart->delItemFromCart($id);
    }
    public function addToCart(){
        $item_id = $this->input->post('item_id');
        $this->db->where('id', $item_id);
        $query = $this->db->get('product');
        if ($query->num_rows() > 0) {
            $item_data = $query->row();
            $item = new Item($item_data->id, $item_data->name, $item_data->price, $item_data->main_image, $item_data->content, $item_data->lead );
            $this->cart->addItem($item);
            $this->Shop_model->save_cart($this->cart);
        }
    }
}

