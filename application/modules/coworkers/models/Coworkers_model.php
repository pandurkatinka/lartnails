<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Coworkers Model
 *
 *
 * @package    
 */
// ------------------------------------------------------------------------
get_instance()->load->iface('ManageMenu');

class Coworkers_model extends CI_Model implements ManageMenu {
    
	function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function fill_menu($menu){
        $coworkers = new Menuitem('coworkers','Munkatársaink', NULL, NULL);
        $menu->addMenuItem($coworkers);
    }

    function get_coworker_data(){
    	$query = $this->db->get('coworkers');
    	if($query->num_rows() > 0){
    		return $query->result();
    	}
    }
}

