<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Contact Model
 *
 *
 * @package   
 */

// ------------------------------------------------------------------------
get_instance()->load->iface('ManageMenu');

class Construction_model extends CI_Model{

	function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    function get_settings($lang='hu'){
        $this->db->where('language', $lang);
        $query = $this->db->get('settings');
        if($query->num_rows() > 0 ){
            return $query->row();
        }
    }
    function get_contact_info($lang = 1){
        $this->db->where('language_id', $lang);
        $query = $this->db->get('contact_info');
        if($query->num_rows() > 0 ){
            return $query->row();
        }
    }

}

