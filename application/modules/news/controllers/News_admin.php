<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News_admin extends MX_Controller {

    /*  Gallery constructor
    *   
    */
    function __construct() {
        parent::__construct();
        $this->OwnHelpers->is_logged_in();
    }

    function index(){

        $this->OwnHelpers->is_logged_in();
        $crud = new grocery_CRUD();
        $crud->set_table('news_category');
        $crud->field_type('seo_url', 'readonly');
        $crud->set_theme('bootstrap');
        $crud->columns('name', 'language');
        $crud->display_as(array(
                            'name' => 'Hír kategória neve',
                            'seo_url' => 'SEO url',
                            'language' => 'Nyelv',
                            'main_image' => 'Főkép',
                            'description' => 'Leírás',
                            'news_order' => 'Sorrend',
            )
            );


        $this->config->set_item('grocery_crud_file_upload_allow_file_types', 'gif|jpeg|jpg|png');
        $crud->set_field_upload('main_image', 'assets/uploads/news_category');
        $crud->add_action('Hírek hozzáadása', '', 'admin/news','ui-icon-plus');

        $language = Modules::run('helper/helper/get_languages');
        $crud->field_type('language', 'dropdown',$language);
        $state_code = $crud->getState();
            if($state_code == 'edit') {
                $crud->field_type('seo_url', 'readonly');
            }
        $output = $crud->render();

        //This is how we update the seo_url field
        Modules::run('helper/helper/update_seo_url','news_category',$crud->getStateInfo()->primary_key,'name','seo_url');
        return $output;
    }

    function news(){

        $this->OwnHelpers->is_logged_in();
        $crud = new grocery_CRUD();
        $crud->set_table('news');
        //$crud->field_type('seo_url', 'readonly');
        //$crud->field_type('news_category', 'readonly');
        $crud->set_theme('bootstrap');
        $url = $this->uri->segment(3,0);
        $crud->where('news_category', $url);
        $crud->columns('title', 'date', 'user', 'language');
        $crud->display_as(array(
                            'title' => 'Cím',
                            'seo_url' => 'SEO url',
                            'news_category' => 'Kategória',
                            'lead' => 'Bevezető',
                            'content' => 'Tartalom',
                            'date' => 'Dátum',
                            'status' => 'Státusz',
                            'featured' => 'Kiemelt hír',
                            'main_image' => 'Kiemelt kép',
                            'tag' => 'Tagek',
                            'videoid' => 'YouTube videoid',
                            'seo_title' => 'SEO kulcsszó',
                            'seo_description' => 'SEO leírás',
                            'header_custom_code' => 'Fejléc custom kód',
                            'language' => 'Nyelv',
            )
            );

        $crud->callback_before_insert(array($this, '_insert_category'));
        $crud->callback_before_update(array($this, '_insert_category'));

        $this->config->set_item('grocery_crud_file_upload_allow_file_types', 'gif|jpeg|jpg|png');
        $crud->set_field_upload('main_image', 'assets/uploads/news_image');
        $crud->add_action('Galéria hozzáadása', '', 'admin/news_gallery','ui-icon-plus');

        $select = array(1 => "Bekapcsolva", 0 => "Kikapcsolva");
        $crud->field_type('status', 'dropdown', $select);

        $select = array(1 => "Bekapcsolva", 0 => "Kikapcsolva");
        $crud->field_type('featured', 'dropdown', $select);
        
        $language = Modules::run('helper/helper/get_languages');
        $crud->field_type('language', 'dropdown',$language);

        $state_code = $crud->getState();
            if($state_code == 'edit') {
                $crud->field_type('seo_url', 'readonly');
                $crud->field_type('news_category', 'readonly');
            }
        $crud->set_relation('news_category', 'news_category', 'name');    
        $output = $crud->render();

        //This is how we update the seo_url field
        Modules::run('helper/helper/update_seo_url','news',$crud->getStateInfo()->primary_key,'title','seo_url');
        return $output;

    }

    public function _insert_category($primary_key) {
        $primary_key['news_category'] = $this->uri->segment(3,0);
        
        return $primary_key;

    }

    function news_gallery(){

        $c = new image_CRUD();

        $c->set_table('news_gallery');
        $c->set_primary_key_field('id');
        $c->set_url_field('file');
        $c->set_ordering_field('orderField');
        $c->set_relation_field('news_category');
        $c->set_title_field('name');
        $c->set_image_path('assets/uploads/gallery_news');

        $output = $c->render();

        $output->oldaltitle = "Képek feltöltése";
        $output->leiras = "";
        return $output;

    }
    

}

