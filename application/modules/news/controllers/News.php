<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News extends MX_Controller {

    /*  News constructor
    *   
    */
    function __construct() {
        parent::__construct();
        $this->load->model('News_model');
    }

    function index(){
        $data['navbar'] = Modules::run('navigation/Navigation_frontend/index');

        $url = $this->uri->segment(2, 0);

        if($url == '' || is_numeric($url) ){
            //If we are at the news homepage or pagination.
            //---------------------------------------------
            
            //We initialize the pagination library
            $this->load->library('pagination');
            //--------------Pagination Start---------------
            $config['base_url'] = base_url('news');
            $config['per_page'] = 1;
            $config['uri_segment'] = 2;
            $config['total_rows'] = 0;
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['first_link'] = '<<';
            $config['last_link'] = '>>';
            $allNews = $this->News_model->getAllNews($url, $config['per_page'], $config['total_rows']);
            $config['total_rows'] = json_decode(json_encode($config['total_rows']), True);
            $config['total_rows'] = $config['total_rows']['FOUND_ROWS()'];
            //--------------Initialization-----------------
            $this->pagination->initialize($config);
            //--------------Creating the links-------------
            $data["links"] = $this->pagination->create_links();
            //--------------Pagination End---------------

            $data['news'] = $allNews;
            $this->load->viewfront('index', $data, FALSE, 0);    

        }
        else{
            $this->display_category($data['navbar']);
        }
    }

    public function display_category($navbar){
        $data['navbar'] = $navbar;
        $url = $this->uri->segment(3, 0);
        if($url == '' || is_numeric($url) ){
            $category = $this->uri->segment(2, 0);
            //If we are at the news homepage or pagination.
            //---------------------------------------------
            //We initialize the pagination library
            $this->load->library('pagination');
            //--------------Pagination Start---------------
            $config['base_url'] = base_url('news/' . $category);
            $config['per_page'] = 1;
            $config['uri_segment'] = 3;
            $config['total_rows'] = 0;
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['first_link'] = '<<';
            $config['last_link'] = '>>';
            $cat_news = $this->News_model->getNews($url, $config['per_page'], $category, $config['total_rows']);
            $config['total_rows'] = json_decode(json_encode($config['total_rows']), True);
            $config['total_rows'] = $config['total_rows']['FOUND_ROWS()'];
            //--------------Initialization-----------------
            $this->pagination->initialize($config);
            //--------------Creating the links-------------
            $data["links"] = $this->pagination->create_links();
            //--------------Pagination End---------------

            $data['cat_news'] = $cat_news;
            $this->load->viewfront('category', $data, FALSE, 0);    

        } else{
            $this->display_single($data['navbar']);
        }
            
    }

    public function display_single($navbar){
        $data['navbar'] = $navbar;
        $url = $this->uri->segment(3, 0);
        $data['news_info'] = $this->News_model->getNewsData($url);
        $this->load->viewfront('single', $data, FALSE, 0);    
        }   
    
    

}

