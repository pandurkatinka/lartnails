<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Gallery Model
 *
 *
 * @package    	
 */
// ------------------------------------------------------------------------
get_instance()->load->iface('ManageMenu');

class News_model extends CI_Model implements ManageMenu {
    
	function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //Get data of a single news
    function getNewsData($url){
        $this->db->where('seo_url', $url);
        $query = $this->db->get('news');
        if($query->num_rows() > 0 ){
            return $query->row();
        }
    }

    //Get all news adata
    function getNews($page, $limit, $cat, &$total){
        $this->db->select('SQL_CALC_FOUND_ROWS n.*, n.seo_url as news_seo, nc.seo_url as category_seo', false);
        $this->db->from('news as n');
        $this->db->limit($limit, $page);
        $this->db->join('news_category as nc', 'n.news_category = nc.id', 'left');
        $this->db->where('status', 1);
        $this->db->where('nc.seo_url', $cat);
        $this->db->order_by('date','desc');
        $query = $this->db->get();
        $total = $this->db->query('SELECT FOUND_ROWS();')->row();
        if($query->num_rows() > 0 ){
            return $query->result();
        }
    }    

    //Get all news adata
    function getAllNews($page, $limit, &$total){
        $this->db->select('SQL_CALC_FOUND_ROWS *, n.seo_url as news_seo, nc.seo_url as category_seo', false);
        $this->db->from('news as n');
        $this->db->limit($limit, $page);
        $this->db->join('news_category as nc', 'n.news_category = nc.id', 'left');
        $this->db->where('status', 1);
        $this->db->order_by('date','desc');
        $query = $this->db->get();
        $total = $this->db->query('SELECT FOUND_ROWS();')->row();
        if($query->num_rows() > 0 ){
            return $query->result();
        }
    }

    //Get the news categories
    function getNewsCat(){
        $query = $this->db->get('news_category');
        if($query->num_rows() > 0 ){
            return $query->row();
        }
    }

    //Fills the Primary menu with the gallery items
    //TODO:
    function fill_menu($menu){
        $news = new Menuitem('hirek','Hírek', NULL, NULL);
        $this->db->order_by('news_order', 'desc');
        $query = $this->db->get('news_category');
        if($query->num_rows() > 0 ){
            $news_cat = $query->result();
            foreach ($news_cat as $value) {
                $news->addChild(
                    new MenuItem('hirek/' . $value->seo_url, $value->name, null, null)
                    );
            }
        };
        $menu->addMenuItem($news);
    }
    
}

