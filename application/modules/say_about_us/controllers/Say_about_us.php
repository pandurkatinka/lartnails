<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Say_about_us extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Say_about_us_model');
    }

    function index(){
        $data['say_about_us'] = $this->Say_about_us_model->get_data();
        $this->load->view("index",$data);

    }



}

