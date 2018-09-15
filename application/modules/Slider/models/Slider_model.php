<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Gallery Model
 *
 *
 * @package    	PopCMS - Say About Us
 * @copyright  	Copyright (c) 2016 Horvath Mate & Csoma Gergo
 * @version    	1.0
 * @author     	Csoma Gergo <csoma.gergo@popularmarketing.hu>
 */
// ------------------------------------------------------------------------

class Slider_model extends CI_Model{

	function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    function get_data(){

        $query = $this->db->where("status","1")->order_by("slider_order", "ASC")->get('slider');
        if($query->num_rows() > 0){
            return $query->result();
        }
    }


}

