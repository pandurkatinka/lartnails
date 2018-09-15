<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Gallery Model
 *
 *
 * @package     PopCMS - gallery
 * @copyright   Copyright (c) 2016 Horvath Mate & Csoma Gergo
 * @version     1.0
 * @author      Horvath Mate <horvath.mate@popularmarketing.hu>
 *              Csoma Gergo <csoma.gergo@popularmarketing.hu>
 */
// ------------------------------------------------------------------------
get_instance()->load->iface('ManageMenu');

class Gallery_model extends CI_Model implements ManageMenu {
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //Fills the Primary menu with the gallery items
    //TODO: 
    function fill_menu($menu){
        $gallery = new Menuitem('gallery','Galéria', NULL, NULL);

        $query = $this->db->get('gallery_category');
        if($query->num_rows()> 0 ){
            $galeriak = $query->result();
            foreach ($galeriak as $value) {
                $gallery->addChild(
                    new MenuItem('gallery/' . $value->seo_url, $value->category_name, null, null)
                    );
            }
        };
        $menu->addMenuItem($gallery);
    }

    // getting galleries -> from gallery ids
    function getGallery($cat_url, $page, $limit, $total){

        $this->db->select('SQL_CALC_FOUND_ROWS *', FALSE);
        $this->db->from('gallery as g');
        $this->db->join('gallery_category as gc', 'g.gallery_category = gc.id');
        $this->db->limit($limit, $page);
        $this->db->where('gc.seo_url', $cat_url);

        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }
    }

    function getAllGalleryCategories(){

        $this->db->from('gallery_category');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }
    }

    // getting galleries -> from gallery ids
    function getAllGallery($page, $limit, $total){

        $this->db->select('SQL_CALC_FOUND_ROWS *', FALSE);
        $this->db->limit($limit, $page);
        $query = $this->db->get('gallery');
        if($query->num_rows() > 0){
            return $query->result();
        }
    }

    function getGalleryImages($gallery_category_id){
        $this->db->where("gallery_category",$gallery_category_id);
        $query = $this->db->get('gallery');
        if($query->num_rows() > 0){
            return $query->result();
        }

    }

}

