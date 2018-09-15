<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/** load the CI class for Modular Extensions **/
require dirname(__FILE__).'/Base.php';

/**
 * Modular Extensions - HMVC
 *
 * Adapted from the CodeIgniter Core Classes
 * @link	http://codeigniter.com
 *
 * Description:
 * This library replaces the CodeIgniter Controller class
 * and adds features allowing use of modules and the HMVC design pattern.
 *
 * Install this file as application/third_party/MX/Controller.php
 *
 * @copyright	Copyright (c) 2015 Wiredesignz
 * @version 	5.5
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 **/
class MX_Controller 
{
	public $autoload = array();
	var $module_root = "";

	public function __construct() 
	{
		$class = str_replace(CI::$APP->config->item('controller_suffix'), '', get_class($this));
		log_message('debug', $class." MX_Controller Initialized");
		Modules::$registry[strtolower($class)] = $this;	
		
		/* copy a loader instance and initialize */
		$this->load = clone load_class('Loader');
		$this->load->initialize($this);	
		
		/* autoload module items */
		$this->load->_autoloader($this->autoload);
		$this->initialize_construct();
//		if($this->router->module !== 'Construction' && $this->router->module !== 'helper' && $this->router->module !== 'auth'){
//			$this->is_under_construct();
//		}
		$this->module_root_initalize();
		// Profiler for debug purposes only
		//$this->output->enable_profiler(TRUE);
		$ci = &get_instance();
		$module = $this->router->fetch_module();
		array_push($ci->load->_ci_cached_vars['modules'], $module);
		

	}
	
	public function __get($class) 
	{
		return CI::$APP->$class;
	}

	//Initializes the under construction session value
	function initialize_construct(){
        if(!isset($this->session->under_construct)){
            $this->session->under_construct = $this->db->get('under_construct')->row()->status;
        }
    }

    //Checks if the site is under construction or not
    function is_under_construct(){
        if($this->session->under_construct == 1){
            redirect(base_url('Construction'), 'refresh');
        }
    }

    function module_root_initalize(){
    	$ci =& get_instance();
    	$this->module_root = $ci->router->module;

    }
}