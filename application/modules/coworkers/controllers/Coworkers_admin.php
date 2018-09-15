<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Coworkers_admin extends MX_Controller {

    /*  Gallery constructor
    *   
    */
    function __construct() {
        parent::__construct();
        $this->load->model('Coworkers_model');
        $this->OwnHelpers->is_logged_in();
    }

    function index(){

        $this->OwnHelpers->is_logged_in();
        $crud = new grocery_CRUD();
        $crud->set_table('coworkers');
        $crud->set_theme('bootstrap');
        $crud->unset_columns('main_img');
        $crud->display_as(array(
                            'name' => 'Név',
                            'job' => 'Munkakör',
                            'twitter' => 'Twitter',
                            'facebook' => 'Facebook',
                            'skype' => 'Skype',
                            'phone' => 'Telefon',
                            'job_desc' => 'Munkakör leírása',
                            'main_img' => 'Főkép',
            )
            );
        $this->config->set_item('grocery_crud_file_upload_allow_file_types', 'gif|jpeg|jpg|png');
        $crud->set_field_upload('main_img', 'assets/uploads/coworkers');

        $language = Modules::run('helper/helper/get_languages');
        $crud->field_type('language', 'dropdown',$language);
        $output = $crud->render();

        return $output;
    }

}

