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

