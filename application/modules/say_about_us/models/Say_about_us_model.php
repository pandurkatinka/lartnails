<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Gallery Model
 *
 *
 * @package    	
 */
// ------------------------------------------------------------------------

class Say_about_us_model extends CI_Model{

	function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    function get_data(){

        $query = $this->db->get('say_about_us');
        if($query->num_rows() > 0){
            return $query->result();
        }
    }


}

