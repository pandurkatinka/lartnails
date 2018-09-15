<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery extends MX_Controller {

    /*  Gallery constructor
    *   
    */
    function __construct() {
        parent::__construct();
        $this->load->model('Gallery_model');
        
    }

    function index(){
        $data['navbar'] = Modules::run('navigation/Navigation_frontend/index');
        //This is an example, how u can get the gallery pictures
        //
        //This way u get the 1 2 3 gallery_category pictures
        
        $uri = $this->uri->segment(2);
        if($uri != ""){
                $this->display_category($data['navbar'],$uri);
        }else{
                //We show the gallery categories when we have min 2 peace, else we show the gallery images
            $gallery_categories = $this->Gallery_model->getAllGalleryCategories();
            if(count($gallery_categories) > 1){
                $data['gallery_categories'] = $gallery_categories;
                $this->load->viewfront('index', $data, false, 1);
            }else{
                $this->display_category($data['navbar'],$this->db->where("id",$gallery_categories->gallery_category)->get("gallery_category")->row()->seo_url);
            }
        }
    }

    function display_category($navbar,$category_seo_url = null){
        $data['navbar'] = $navbar;
        $url = $this->uri->segment(3, 0);
        if($category_seo_url != "")
            $category = $category_seo_url;
        else
            echo $category = $this->uri->segment(2);


        //We initialize the pagination library
            $this->load->library('pagination');
            //--------------Pagination Start---------------
            $config['base_url'] = base_url('gallery/' . $url);
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
            $gallery_pictures = $this->Gallery_model->getGallery($category, $url, $config['per_page'], $config['total_rows']);
            $config['total_rows'] = json_decode(json_encode($config['total_rows']), True);
            $config['total_rows'] = $config['total_rows']['FOUND_ROWS()'];
            //--------------Initialization-----------------
            $this->pagination->initialize($config);
            //--------------Creating the links-------------
            $data["links"] = $this->pagination->create_links();
            //--------------Pagination End---------------

            $data['gallery_pictures'] = $gallery_pictures;
            $this->load->viewfront('category', $data, false, 1);
    }

    
}

