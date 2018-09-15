<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->lang->load('message', 'hungarian');
    }

    function index(){
        $data = null;
        $this->load->viewfront('index', $data, FALSE, 0);
    }

    function sendMail(){
        $this->load->library('recaptcha');

        $recaptcha = $this->input->post('g-recaptcha-response');
        if (!empty($recaptcha) && isset($recaptcha)) {
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (isset($response['success']) and $response['success'] === true) {

                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $subject = $this->input->post('subject') != "" ? " - ".$this->input->post('subject')." - " : "" ;
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
                $this->email->to($this->db->get("contact_info")->row()->publicemail);
                $this->email->subject(lang("email_contact_name")." ".$subject.base_url());
                $this->email->message($email_body);

                if($this->email->send()){
                    echo json_encode(array("status"=> "ok","message" => lang("email_stock_message")));
                }else{
                    echo json_encode (array("status"=> "error","message" => lang("email_stock_error")));
                };
            } else { echo json_encode (array("status"=> "error","message" => lang("recaptcha_error_message")));} 
        }else { echo json_encode (array("status"=> "error","message" => lang("recaptcha_error_message")));} 
    }

    function embedForm(){
        $data ="";
        // nem kell module loadert hasznalni egyaltalan igy mar ^^
        echo $this->load->view("embed_form");
    }
}

