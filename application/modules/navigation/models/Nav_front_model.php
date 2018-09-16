<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Frontend Model
 *
 *
 * @package    
 */
// ------------------------------------------------------------------------
class Nav_front_model extends CI_Model  {

	function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->config('navigation');
    }


    public function buildNavigation(){
        
    }

    /*
    public function getMenu(){
        $modules = $this->config->item('modules');
        $menu = array();
        foreach ($modules as $module) {
            array_push($menu, Modules::run($module.'/getNav'));
        }
        return $menu;
    }*/
    
}

