<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Product Model
 *
 *
 * @package    	
 */
// ------------------------------------------------------------------------
//get_instance()->load->iface('ManageMenu');

class Products_model extends CI_Model{
    
	function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //Get data of a single news
    function getProductData($url){
        $this->db->where('seo_url', $url);
        $query = $this->db->get('product');
        if($query->num_rows() > 0 ){
            return $query->row();
        }
    }

    //Get product adata
    function getProducts($page, $limit, $cat, &$total){
        $this->db->select('SQL_CALC_FOUND_ROWS p.*, p.seo_url as product_seo, pc.url as category_seo', false);
        $this->db->from('product as p');
        $this->db->limit($limit, $page);
        $this->db->join('product_category as pc', 'p.product_category_id = pc.id', 'left');
        $this->db->where('p.status', 1);
        $this->db->where('pc.url', $cat);
        $query = $this->db->get();
        $total = $this->db->query('SELECT FOUND_ROWS();')->row();
        if($query->num_rows() > 0 ){
            return $query->result();
        }
    }    

    //Get all products adata
    function getAllProducts($page, $limit, &$total){
        $this->db->select('SQL_CALC_FOUND_ROWS *, p.*, p.seo_url as product_seo, pc.url as category_seo', false);
        $this->db->from('product as p');
        $this->db->limit($limit, $page);
        $this->db->join('product_category as pc', 'p.product_category_id = pc.id', 'left');
        $this->db->where('p.status', 1);
        $query = $this->db->get();
        $total = $this->db->query('SELECT FOUND_ROWS();')->row();
        if($query->num_rows() > 0 ){
            return $query->result();
        }
    }

    //Get the product categories
    function getProdCat(){
        $query = $this->db->get('product_category');
        if($query->num_rows() > 0 ){
            return $query->row();
        }
    }
    //get the product pictures
    function getProdPic($id){
        $this->db->where('product_id', $id);
        $query = $this->db->get('product_images');
        if($query->num_rows() > 0){
            return $query->result();
        }
    }

    
}

