<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products_admin extends MX_Controller {

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
        $crud->set_table('product_category');
        $crud->field_type('seo_url', 'readonly');
        $crud->set_theme('bootstrap');
        $crud->columns('name', 'language');
        $crud->display_as(array(
                            'name' => 'Termék kategória neve',
                            'url' => 'SEO url',
                            'language' => 'Nyelv',
                            'main_image' => 'Főkép',
                            'content' => 'Leírás'
            )
            );

        /*$this->config->set_item('grocery_crud_file_upload_allow_file_types', 'gif|jpeg|jpg|png');
        $crud->set_field_upload('main_image', 'assets/uploads/product_category');
        $crud->add_action('Képek feltöltése', '', 'admin/product_image_upload','ui-icon-plus');*/

        $crud->set_relation('parent','product_category','name');
        $language = Modules::run('helper/helper/get_languages');
        $crud->field_type('language', 'dropdown',$language);
        $crud->change_field_type('status', 'true_false');
        $output = $crud->render();

        //This is how we update the seo_url field
        Modules::run('helper/helper/update_seo_url','product_category',$crud->getStateInfo()->primary_key,'name','url');
        return $output;
    }

    function products(){

        $this->OwnHelpers->is_logged_in();
        $crud = new grocery_CRUD();
        $crud->set_table('product');
        $crud->field_type('seo_url', 'readonly');
        $crud->set_theme('bootstrap');
        $crud->columns('name', 'language');
        $crud->display_as(array(
                            'name' => 'Termék neve',
                            'seo_url' => 'SEO url',
                            'language' => 'Nyelv',
                            'price' => 'Ár',
                            'special_price' => 'Akciós ár',
                            'main_image' => 'Főkép',
                            'content' => 'Leírás',
                            'product_category_id' => 'Termék kategória',
                            'status' => 'Státusz',
                            'item_number' => 'Termékkód/Cikkszám',

            )
            );

        $crud->required_fields('name','price');

        $this->config->set_item('grocery_crud_file_upload_allow_file_types', 'gif|jpeg|jpg|png');
        $crud->set_field_upload('main_image', 'assets/uploads/products');
        
        $crud->add_action('Képek feltöltése', '', 'admin/product_image_upload','ui-icon-plus');
        $crud->set_relation('product_category_id','product_category','name');
        $language = Modules::run('helper/helper/get_languages');
        $crud->field_type('language', 'dropdown',$language);
        $crud->change_field_type('status', 'true_false');
        $output = $crud->render();

        //This is how we update the seo_url field
        Modules::run('helper/helper/update_seo_url','product',$crud->getStateInfo()->primary_key,'name','seo_url');
        return $output;
    }

    function product_image_upload(){

        $c = new image_CRUD();

        $c->set_table('product_images');
        $c->set_primary_key_field('id');
        $c->set_url_field('product_image');
        $c->set_ordering_field('product_image_order');
        $c->set_relation_field('product_id');
        $c->set_title_field('image_title');
        $c->set_image_path('assets/uploads/products');

        $output = $c->render();

        $output->oldaltitle = "Képek feltöltése";
        $output->leiras = "";
        return $output;

    }

}

