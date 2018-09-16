<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Contact Model
 *
 *
 * @package    
 */

// ------------------------------------------------------------------------
get_instance()->load->iface('ManageMenu');

class Contact_model extends CI_Model implements ManageMenu {

	function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    function fill_menu($menu){
    	$menu->addMenuItem(
    		new MenuItem('kapcsolat', 'Kapcsolat', NULL, NULL)
    		);
    }

}

