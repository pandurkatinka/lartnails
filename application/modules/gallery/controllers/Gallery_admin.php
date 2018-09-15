<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery_admin extends MX_Controller {

    /*  Gallery constructor
    *   
    */
    function __construct() {
        parent::__construct();
        $this->load->model('Gallery_model');
        $this->load->library('image_CRUD');
        $this->OwnHelpers->is_logged_in();
    }

    function index(){

        $this->OwnHelpers->is_logged_in();
        $crud = new grocery_CRUD();
        $crud->set_table('gallery_category');
        $crud->field_type('seo_url', 'readonly');
        $crud->set_theme('bootstrap');
        $crud->columns('category_name', 'language');
        $crud->display_as(array(
                            'category_name' => 'Galéria mappa neve',
                            'seo_url' => 'SEO url',
                            'language' => 'Nyelv',
                            'main_image' => 'Főkép',
                            'description' => 'Leírás'
            )
            );

        $this->config->set_item('grocery_crud_file_upload_allow_file_types', 'gif|jpeg|jpg|png');
        $crud->set_field_upload('main_image', 'assets/uploads/gallery_category');
        $crud->add_action('Képek feltöltése', '', 'admin/gallery_image_upload','ui-icon-plus');

        $language = Modules::run('helper/helper/get_languages');
        $crud->field_type('language', 'dropdown',$language);
        $output = $crud->render();

        //This is how we update the seo_url field
        Modules::run('helper/helper/update_seo_url','gallery_category',$crud->getStateInfo()->primary_key,'category_name','seo_url');
        return $output;
    }

    function gallery_image_upload(){

        $c = new image_CRUD();

        $c->set_table('gallery');
        $c->set_primary_key_field('id');
        $c->set_url_field('file');
        $c->set_ordering_field('orderField');
        $c->set_relation_field('gallery_category');
        $c->set_title_field('name');
        $c->set_image_path('assets/uploads/gallery');

        $output = $c->render();

        $output->oldaltitle = "Képek feltöltése";
        $output->leiras = "";
        return $output;

    }

}

