<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Coworkers Model
 *
 *
 * @package    	PopCMS - coworkers
 * @copyright  	Copyright (c) 2016 Horvath Mate & Csoma Gergo
 * @version    	1.0
 * @author     	Horvath Mate <horvath.mate@popularmarketing.hu>
 *              Csoma Gergo <csoma.gergo@popularmarketing.hu>
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

