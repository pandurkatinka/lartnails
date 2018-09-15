<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Navigation_admin extends MX_Controller {

    /*  Navigation constructor
    *
    *  Itt rakjuk össze a menüket melyek lehetnek  primari_menu, sidebar_menu,footer_menu
    */
    protected $menu;

    function __construct() {
        parent::__construct();
        $this->load->library('menu');
        $this->load->library('menuitem');
        $this->OwnHelpers->is_logged_in();
    }

    function index(){
        $this->OwnHelpers->is_logged_in();
        $crud = new grocery_CRUD();
        $crud->set_table('menu');
        $crud->set_theme('bootstrap');
        $crud->columns('menu_name', 'language');
        $crud->display_as(array(
                            'menu_name' => 'Név neve',
                            'menu_elemek' => 'Menü elemek',
                            'language' => 'nyelv'
            )
            );
        $crud->add_action('Menüpont hozzáadása', '', 'navigation/navigation_admin/addMenuItem','ui-icon-plus');
        $language = Modules::run('helper/helper/get_languages');
        //$crud->set_relation_n_n('menu_elemek', '');
        $crud->field_type('language', 'dropdown',$language);
        $output = $crud->render();

        //This is how we update the seo_url field
        Modules::run('helper/helper/update_seo_url','gallery_category',$crud->getStateInfo()->primary_key,'category_name','seo_url');
        return $output;
    }

    function addMenuItem(){

    }


}

