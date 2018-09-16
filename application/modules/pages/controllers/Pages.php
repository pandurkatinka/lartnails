<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pages extends MX_Controller {

    /*  Pages constructor
    *   
    */
    function __construct() {
        parent::__construct();
        $this->load->model('Pages_model');
    }

    function index(){

    	// This is an example, how u get the pages data, and how u can use it
        //
        
        $data=null; 
        $url = $this->uri->segment(2,0);
        $data['site_data'] = $this->Pages_model->getPageData($url);

        // if you want to use shortcodes on your pages admin -> use this function to load the shortcode replacer from the Pages_model
        $data['site_data'][0]->content = $this->Pages_model->parseShortcodes($data['site_data'][0]->content);
        switch ($url) {
            case 'lart-titan-manikur':
                $this->load->viewfront('lart_dipping_system', $data, FALSE, 0);
                break;

            case 'lart-hybrid-gellakk':
                $this->load->viewfront('lart_gel_polish_system', $data, FALSE, 0);
                break;
           
            default:
                $this->load->viewfront('index', $data, FALSE, 0);
                break;


                
        }
    	
    }


}

