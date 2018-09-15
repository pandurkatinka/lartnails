<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontpage extends MX_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('Frontpage_model');
        $this->load->helper('url');
    }

	public function index()
	{
		//Constant required for external CI requests outside of the codeigniter application. do not remove ever!
		if (@REQUEST == "external") {
        	return;
    	}

    	$data['site_data'] = null;
		$this->load->viewfront('index', $data, FALSE, 0);
	}

}
