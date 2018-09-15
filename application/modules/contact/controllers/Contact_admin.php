<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact_admin extends MX_Controller {

    /*  Under Construction constructor
    |
    |   
    |*/
    function __construct() {
        parent::__construct();
    }

    function index(){
        $this->OwnHelpers->is_logged_in();
        $crud = new grocery_CRUD();
        $crud->set_table('contact_info');
        $crud->set_theme('bootstrap');
        $crud->columns('language_id', 'adminemail','businessaddress', 'isopen');
        $crud->display_as(array(
                            'language_id' => 'Nyelv',
                            'mobil' => 'Mobil szám',
                            'phone' => 'Vezetékes telefon',
                            'taxnumber' => 'Adószám',
                            'siteaddress' => 'Honlap cím',
                            'businessaddress' => 'Üzletcím',
                            'adminemail' => 'Admin email',
                            'publicemail' => 'Nyilvános email',
                            'mobil' => 'Mobil szám',
                            'shophours' => 'Nyitvatartási idő',
                            'isopen' => 'Nyitvatartás', 
            )
            );
        $crud->set_relation('language_id', 'language', 'name');
        $crud->set_subject('Elérhetőségek');
        $output = $crud->render();
        return $output;
    }
}

