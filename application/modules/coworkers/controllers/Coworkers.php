<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Coworkers extends MX_Controller {

    /*  Co-workers constructor
    *   
    */
    function __construct() {
        parent::__construct();
        $this->load->model('Coworkers_model');
    }

    function index($option = null){
        $data['site_data'] = $this->Coworkers_model->get_coworker_data();
        if($option == "frontpage"){
            $this->load->view('frontpage', $data);
        }else{
            $data['navbar'] = Modules::run('navigation/Navigation_frontend/index');
            $this->load->viewfront('index', $data, FALSE, 0);
        }

    }

}

