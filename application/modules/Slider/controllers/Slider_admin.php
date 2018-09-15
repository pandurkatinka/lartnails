<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slider_admin extends MX_Controller {

    /*  Products constructor
    *   
    */
    function __construct() {
        parent::__construct();
        $this->OwnHelpers->is_logged_in();
    }

    function index(){

        $this->OwnHelpers->is_logged_in();
        $crud = new grocery_CRUD();
        $crud->set_table('slider');
        $crud->set_theme('bootstrap');
        $crud->columns('name','main_image', 'language');
        $crud->display_as(array(
                            'name' => 'Slider neve',
                            'content' => 'Szöveg',
                            'language' => 'Nyelv',
                            'main_image' => 'Kép',
                            'ext_url' => 'Url',
                            'status' => 'Státusz',
            )
            );

        $this->config->set_item('grocery_crud_file_upload_allow_file_types', 'gif|jpeg|jpg|png');
        $crud->set_field_upload('main_image', 'assets/uploads/sliders');

        $language = Modules::run('helper/helper/get_languages');
        $crud->field_type('language', 'dropdown',$language);
        $crud->change_field_type('status', 'true_false');
        $output = $crud->render();

        return $output;
    }


}

