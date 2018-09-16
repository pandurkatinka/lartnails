<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Login Model
 *
 
 */

// ------------------------------------------------------------------------
class Admin_model extends CI_Model  {

	function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function is_logged_in(){
        if($this->session->isLoggedIn != 1){
            redirect(base_url('Auth'),'refresh');
        }
    }

    function get_user(){
        $user_id = $this->session->user_id;
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('users');
        if($query->num_rows() > 0 ){
            return $query->row();
        }
    }
    function get_settings($lang='hu'){
        $this->db->where('language', $lang);
        $query = $this->db->get('settings');
        if($query->num_rows() > 0 ){
            return $query->row();
        }
    }

	function get_subscriber() {

			//Getting all the subscribers from the database :)
			$this->db->select('*');
			$query = $this->db->get('subscribers');
			return $query->result();
		}

	function get_newsletter() {

			//Getting the newsletter from the database :)
			$this->db->select('*');
			$query = $this->db->get('newsletter');
			return $query->row();
		}

    //this helper function hashes the pw to the database
    function hash_pw($password){
        /**
         * In this case, we want to increase the default cost for BCRYPT to 10.
         * Note that we also switched to BCRYPT, which will always be 60 characters.
         */
        $options = [
            'cost' => 10,
        ];
        $hashedpw = password_hash($password, PASSWORD_BCRYPT, $options);
        return $hashedpw;
    }

}
