<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Helper extends MX_Controller {



	//This function create the models js dynamically
	public function footer_module_scripts(){
		$this->output->set_header('Content-type: text/javascript');
        //$this->load->view();
        //echo $output;
        
        $modules = $this->input->get('modules');
        $modules = explode(' ', $modules);
        unset($modules[count($modules)-1]);
        $output = '';
        $output .= "$(document).ready(function(){";
        $CI = &get_instance();

        foreach ($modules as $value) {
                $output .= $this->OwnHelpers->load_module_js($value);
                $output .= '
                ';
        }
        $output .= " })";
        echo $output;
	}

	public function get_languages(){

		$array = array(
			"hu" => "Magyar"
			);
		return $array;
	}


    function update_seo_url($table_name, $row_id, $name_type,$url_type ) {

    	$up = array($url_type =>$this->create_seo_string($this->db->where("id",$row_id)->get($table_name)->row()->$name_type));
    	
    		$this->db->where("id",$row_id)->update($table_name,$up);
    	
    }

    function default_scripts(){
            $data["req_error"] = lang("req_error");
            $this->load->view("js/default_scripts",$data);
    }



    function create_seo_string($txt) {
        $ekezetes = array(',', 'á', ' ', 'Á', 'É', 'Í', 'Ó', 'Ö', '&#213;', 'Ú', 'Ü', '&#219;', 'á ', 'é', 'í', 'ó', 'ö', '&#245;', 'ú', 'ü', '&#251;', 'ű', 'Ű ', 'Ő', 'ő', 'lő', 'ű', 'á', '!', '?');
        $ekezettelen = array('', 'a', '_', 'a', 'e', 'i', 'o', 'o', 'o', 'u', 'u', 'u', 'a', 'e', 'i', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'U', 'o', 'o', 'u', 'a', '', '');
        $url = rawurlencode(mb_strtolower(str_replace($ekezetes, $ekezettelen, $txt), 'UTF-8')); 
        if($url === 'fooldal' || $url === 'index' || $url === 'kezdolap') return '';
        return $url;
    }

}
