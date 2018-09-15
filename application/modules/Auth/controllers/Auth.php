<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends MX_Controller {

    /*  Login constructor
    *   Handles the login form, and the login 
    */
    function __construct() {
        parent::__construct();

        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        $this->load->model('Auth_model');
    }

    public function index(){
        $this->load->view('login');
    }

    //function for login
    public function login(){
        //we get the email and pass from the ajax post
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $response = '';
        
        if($this->Auth_model->do_login($email, $password, $response) == 1){
            echo $response;
        }else{
            echo $response;    
        }
    }

    //function for logout
    public function logout(){
        $this->Auth_model->do_logout();
    }

    //forgot pass recovery func
    public function passrec(){
        $email = $this->input->post('email');
        $response = '';
        if($this->Auth_model->forget_pw($email, $response) == 1){
            echo $response;
        }else{
            echo $response;
        }
    }

}

