<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pages_admin extends MX_Controller {

    /*  Pages constructor
    *   
    */
    function __construct() {
        parent::__construct();
        $this->load->model('Pages_model');
        $this->OwnHelpers->is_logged_in();
    }

    function index(){
        $this->OwnHelpers->is_logged_in();
        $crud = new grocery_CRUD();
        $crud->set_table('page');
        $crud->set_theme('bootstrap');
        $crud->columns('language', 'name','ext_url', 'status');
        $crud->display_as(array(
                            'language' => 'Nyelv',
                            'name' => 'Név',
                            'content' => 'Tartalom',
                            'ext_url' => 'Külső url link',
                            'page_order' => 'Sorrend',
                            'status' => 'Státusz',
                            'main_image' => 'Főkép',
                            'seo_title' => 'SEO cím',
                            'seo_keywords' => 'SEO Kulcsszavak',
                            'seo_description' => 'SEO leírás',
                            'header_custom_code' => 'Egyéni fejléc kód',
                            'parent' => 'Szülő oldal' 
            )
            );

        $this->config->set_item('grocery_crud_file_upload_allow_file_types', 'gif|jpeg|jpg|png');
        $crud->set_field_upload('main_image', 'assets/uploads/pages');

        $language = Modules::run('helper/helper/get_languages');
        $crud->field_type('language', 'dropdown',$language);
        $crud->change_field_type('status', 'true_false');
        $crud->set_relation('parent','page','name');
        $crud->set_subject('Oldalak');
        $state_code = $crud->getState();
            if($state_code == 'edit') {
                $crud->field_type('seo_url', 'readonly');
            }
        $output = $crud->render();

        //This is how we update the seo_url field
        //If the pagename is: index/fooldal/kezdolap the seo url will be ''
        //wich will redirect to the base_url in the navigation menu
        Modules::run('helper/helper/update_seo_url','page',$crud->getStateInfo()->primary_key,'name','seo_url');
        return $output;
    }

}

