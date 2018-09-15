<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Frontend Model
 *
 *
 * @package    	PopCMS - Frontend
 * @copyright  	Copyright (c) 2016 Horvath Mate & Csoma Gergo
 * @version    	1.0
 * @author     	Horvath Mate <horvath.mate@popularmarketing.hu>
 *              Csoma Gergo <csoma.gergo@popularmarketing.hu>
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

