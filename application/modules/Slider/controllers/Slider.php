<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slider extends MX_Controller {

    /*  Gallery constructor
    *   
    */
    function __construct() {
        parent::__construct();
        $this->load->model('Slider_model');
        
    }

    function index(){
        $data['slider'] = $this->Slider_model->get_data();
        $this->load->view("index",$data);
    }

}

