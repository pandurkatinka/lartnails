<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Contact Model
 *
 *
 * @package    	PopCMS - Contact
 * @copyright  	Copyright (c) 2016 Horvath Mate & Csoma Gergo
 * @version    	1.0
 * @author     	Horvath Mate <horvath.mate@popularmarketing.hu>
 *              Csoma Gergo <csoma.gergo@popularmarketing.hu>
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
    		new MenuItem('contact', 'Kapcsolat', NULL, NULL)
    		);
    }

}

