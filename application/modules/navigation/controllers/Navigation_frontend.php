<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Navigation_frontend extends MX_Controller {

    /*  Navigation constructor
    */

    protected $menu;

    function __construct() {
        parent::__construct();
        $this->load->model('Nav_front_model');
        $this->load->library('menu');
        $this->load->library('menuitem');

        $this->load->model('pages/Pages_model');
        //$this->load->model('gallery/Gallery_model');
        //$this->load->model('news/News_model');
        //$this->load->model('shop/Shop_model');
        $this->load->model('contact/Contact_model');
        //$this->load->model('coworkers/Coworkers_model');
        //$this->load->model('newsletter/Newsletter_model');

        $this->menu = new Menu();
    }

    function index(){
    	// Ezt hívjuk meg a frontendből a következő képpen
    	// Modules :: run (navigation/navigation_frontend/primary_menu)
    	// Ebben van benne a multidimenziós objekt ami tartalmazza az összeállított primari menu sutruktúrát
        //
        $data['nav'] = $this->menu;
        if(count($this->menu) == 0 ){
            //$this->Shop_model->fill_menu($this->menu);
            $this->Pages_model->fill_menu($this->menu);
            //$this->Coworkers_model->fill_menu($this->menu);
            //$this->Gallery_model->fill_menu($this->menu);
            //$this->News_model->fill_menu($this->menu);
            //$this->Newsletter_model->fill_menu($this->menu);
            $this->Contact_model->fill_menu($this->menu);
            
        }


        //$data['nav'] = $this->Pages_model->getNav();
        return $this->load->view('navigation_frontend', $data);

    }
    function tagcloud(){
        $data['cloud'] = new Menu();
        if(count($data['cloud']) == 0 ){
            $this->Pages_model->buildCloud('hu', $data['cloud']);
            //$this->Coworkers_model->fill_menu($data['cloud']);
            //$this->Gallery_model->fill_menu($data['cloud']);
            //$this->News_model->fill_menu($data['cloud']);
            $this->Shop_model->fill_menu($data['cloud']);
            $this->Contact_model->fill_menu($data['cloud']);
            //$this->Newsletter_model->fill_menu($data['cloud']);

            unset($data['cloud']->items[0]);
        }
        return $this->load->view('navigation_cloud', $data);        
    }

    function sidebar_menu(){

    }

    function footer_menu(){


    }


}
