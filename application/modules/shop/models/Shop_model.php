<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Paypal Model
 *
 *
 * @package    	PopCMS - Login
 * @copyright  	Copyright (c) 2016 Horvath Mate & Csoma Gergo
 * @version    	1.0
 * @author     	Horvath Mate <horvath.mate@popularmarketing.hu>
 *              Csoma Gergo <csoma.gergo@popularmarketing.hu>
 *
 * Paypal model using Omnipay. 
 */
// ------------------------------------------------------------------------
get_instance()->load->iface('ManageMenu');
class Shop_model extends CI_Model implements ManageMenu {

	function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function save_cart($cart){
        $this->session->cart = $cart;
    }

    //Fills the Primary menu with the gallery items
    //TODO:
    function fill_menu($menu){
        $shop = new Menuitem('products','Termékek', NULL, NULL);

        $query = $this->db->get('product_category');
        if($query->num_rows()> 0 ){
            $termekek = $query->result();
            foreach ($termekek as $value) {
                $shop->addChild(
                    new MenuItem('products/' . $value->url, $value->name, null, null)
                    );
            }
        };
        $menu->addMenuItem($shop);
    }

}

