<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Frontend Model
 *
 *
 * @package    	
 */
// ------------------------------------------------------------------------
class Frontpage_model extends CI_Model  {
    
	function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listMenu($Menu){
        
        foreach($Menu as $Cat){
            if(array_key_exists('children', $Cat)){
                echo '<li class="dropdown"><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">';    
            }else{
                echo '<li>';    
            }
            
            
            print_r('<a>' . $Cat['name'] . '</a>');
            
            if(array_key_exists('children', $Cat)){
                echo '<span class="caret"></span></button>';
                echo '<ul class="dropdown-menu">';
                $this->listMenu($Cat['children']);
                echo '</ul>';
            }
            echo '</li>';
        }

    }
    
   // function is_under_construct(){
   //     if($this->session->under_construct == 1){
   //         redirect(base_url('Construction'), 'refresh');
   //     }
   // }
    
}

