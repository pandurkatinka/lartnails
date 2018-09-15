<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Newsletter Model
 *
 *
 * @package    	PopCMS - Newsletter
 * @copyright  	Copyright (c) 2016 Iván János Benedek
 * @version    	1.0
 * @author     	Iván János Benedek <ivan.benedek@popularmarketing.hu>
 *
 */
// ------------------------------------------------------------------------

get_instance()->load->iface('ManageMenu');

class Newsletter_model extends CI_Model implements ManageMenu {

	function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function leiratkozas($nev,$mail) {
       $this->db->where('name', $nev);
       $this->db->where('email', $mail);
       $this->db->delete('subscribers');
     }

     function fill_menu($menu){
       $menu->addMenuItem(
         new MenuItem('newsletter', 'Hírlevél', NULL, NULL)
         );
     }

}
