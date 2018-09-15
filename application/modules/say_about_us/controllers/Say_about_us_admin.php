<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Say_about_us_admin extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->OwnHelpers->is_logged_in();
    }

    function index(){

        $this->OwnHelpers->is_logged_in();
        $crud = new grocery_CRUD();
        $crud->set_table('say_about_us');
        $crud->set_theme('bootstrap');
        $crud->columns('name', 'image');
        $crud->display_as(array(
                            'name' => 'Név',
                            'image' => 'Kép',
                            'comment' => 'Hozzászólás',
                            'language' => 'Nyelv'
            )
            );

        $this->config->set_item('grocery_crud_file_upload_allow_file_types', 'gif|jpeg|jpg|png');
        $crud->set_field_upload('image', 'assets/uploads/say_about_us');

        $language = Modules::run('helper/helper/get_languages');
        $crud->field_type('language', 'dropdown',$language);
        $output = $crud->render();

        return $output;
    }

}

