<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Construction extends MX_Controller {

    /*  Under Construction constructor
    |
    |   
    |*/
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Construction_model');
    }

    public function index(){
        $query = $this->db->get('under_construct')->row();
        //$data['launch_time'] = $query->time; 
        //$data['launch_url'] = $query->launch_url;
        $data['site_set'] = $this->Construction_model->get_settings();
        $data['contact_info'] = $this->Construction_model->get_contact_info();
        
        $time = explode(' ', $query->time);
        $temp = explode('-', $time[0]);
        $temp2 = $temp[1] . '/' . $temp[2] .'/' . $temp[0];

        $data['launch_time'] = $temp2 . ' ' . $time[1];
        $data['launch_url'] = $query->launch_url;
        $this->load->view('index', $data);
    }

    public function sendMail(){
        $this->load->library('recaptcha');
        $recaptcha = $this->input->post('g-recaptcha-response');
        if (!empty($recaptcha) && isset($recaptcha)) {
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (isset($response['success']) and $response['success'] === true) {
                
                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $message = $this->input->post('message');
                $webpage = $this->input->post('webpage');
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
                $this->email->to('horvath.mate@popularmarketing.hu');
                $this->email->subject('Weboldal visszajelzés - ' . $webpage);
                $this->email->message($message);

                if($this->email->send()){
                    echo 'Az emailt elküldtük! Köszönjük!';
                }else{
                    echo 'Hiba történt, próbálja meg újra!';
                };
            } else { print_r($response);} 
        }else { echo 'Kérem töltse ki a recaptchát!';} 

    }

    //function for checking and unlocking the site preview
    public function check_preview(){

        $this->load->library('recaptcha');
        $recaptcha = $this->input->post('g-recaptcha-response');
        if (!empty($recaptcha) && isset($recaptcha)) {
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (isset($response['success']) and $response['success'] === true) {

                $pass = $this->input->post('construct_pass');
                $this->db->where('pass', $pass);
                $query = $this->db->get('under_construct');
                if($query->num_rows() > 0){
                    $this->session->under_construct = 0;
                    echo 'Helyes jelszó!';
                }else{
                    echo 'Hibás jelszó!';
                }
            } else { print_r($response);} 
        }else { echo 'Kérem töltse ki a recaptchát!';} 

    }

}

