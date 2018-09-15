<?php

/**
 * OwnHelpers Model
 *
 *
 * @author     	Csoma Gergő & Horváth Máté
 * @version    	1.0
 */

class OwnHelpers  extends CI_Model  {

	function __construct()
    {
        parent::__construct();
        $this->load->helper('directory');
    }


	function seo_string($string)
	{
	$from = array(' ','Á','É','Í','Ó','Ö','&#213;','Ú','Ü','&#219;','á ','é','í','ó','ö','&#245;','ú','ü','&#251;','ű','Ű ','Ő','ő','lő','ű');
	$to = array('-','a','e','i','o','o','o','u','u','u','a','e','i', 'o','o','o','u','u','u','u','U','o','o','u');
	return strtolower(str_replace($from, $to, $string));
	}

	public function cmp($a, $b)
	{
	    return strcmp($a->filename, $b->filename);
	}

	/*
	@array data =  This is the view data
	@string jsfile = The name of the file, what I want to load from xy folder. If this not empty, the function load the js file from modules->module->view->js->jsfile.php
	*/
	function load_module_js($module_root,$data = NULL, $jsfile = NULL){

			
			// Gets the actual module name we are in
			$module_dir_name = $module_root;
			$module_dir_name = mb_strtolower( $module_dir_name, "UTF-8");

			// Maps the actuale modules js directory
		
			//$jsdir = directory_map('./application/modules/' . $module_dir_name . '/views/js/');

		
			$path = APPPATH . 'modules/' . $module_dir_name . '/views/js';
			if(is_dir($path)){
				

				$directory = new \RecursiveDirectoryIterator($path, \FilesystemIterator::FOLLOW_SYMLINKS);
				$filter = new \RecursiveCallbackFilterIterator($directory, function ($current, $key, $iterator) {
				  // Skip hidden files and directories.
				  if ($current->getFilename()[0] === '.') {
				    return FALSE;
				  }
				  if ($current->isDir()) {
				    // Only recurse into intended subdirectories.
				    //return $current->getFilename() === 'assets';
				    return $current->getFilename();
				  }
				  else {
				    // Only consume files of interest.
				    //return strpos($current->getFilename(), 'style') === 0;
				    return $current->getFilename();
				    

				  }
				});
				$iterator = new \RecursiveIteratorIterator($filter);
				$files = array();
				//$files = (object)$files;
				foreach ($iterator as $key => $info) {
					$file = array();
					$file['filename'] = $info->getPathname();
					$file['ext'] = pathinfo($info->getPathname(), PATHINFO_EXTENSION);

					$file['file'] = mb_substr(
						$file['filename'],
						strpos($file['filename'], 'js'),
						NULL,
						'UTF-8'
						);
					if($file['ext'] === 'php'){
						$file = (object)$file;
						array_push($files, $file);	
					}
					
				}
				//we sort the files in the right alphabetical order
				usort($files, array($this, 'cmp'));

				if(sizeof($files) > 0){
					// Selects the php files from that js library for the dynamic loading of js scripts

					
						$output = NULL;
						foreach ($files as $file) {
							$output .= " 
/* Modul: " . $module_root. '/'. $file->file ." start: ".$file->file." */
";
							$output .=  $this->load->view($module_root .'/'.$file->file, $data, TRUE);
							$output .= "
/* Modul js end: ".$file->file." */
";
						}

						/*if(strpos($this->session->footer_module_scripts , $file->file) == "")
							$this->session->footer_module_scripts = $this->session->footer_module_scripts.$output;*/
						

						return $output;
				}
				else {return 'false';}

			}else{
				return false;
			}
			
	    	

	}

	function load_main_js($data = NULL){
		// Maps the actuale modules js directory
		$jsdir = directory_map('./application/views/js/');
		
		if($jsdir != NULL){
			// Selects the php files from that js library for the dynamic loading of js scripts
			$jsfiles = array();
			if(sizeof($jsdir) > 0){		
				foreach ($jsdir as $file) {
					$file_path = './application/views/js/' . $file;
					if(pathinfo($file_path, PATHINFO_EXTENSION) == 'php'){
						array_push($jsfiles, $file);
					}
				}
			}


			if(sizeof($jsfiles) > 0){
				$output = NULL;
				foreach ($jsfiles as $file) {
					$output .= $this->load->view('js/' . $file, $data, TRUE);
				}
				return $output;
			}
			else {return 'false';}
		} else {return 'false';}
		

	}
	/*
	This function search and load the js or css files, from asset/frontend folder to frontend 
	@type string = css or js
	 */
	function load_css_and_js_to_frontend($type){

			if($type === 'css'){
				$path = 'assets/template/frontend/css';	
			}
			if($type === 'js'){
				$path =  'assets/template/frontend/js';
			}
			
	    	$directory = new \RecursiveDirectoryIterator($path, \FilesystemIterator::FOLLOW_SYMLINKS);
			$filter = new \RecursiveCallbackFilterIterator($directory, function ($current, $key, $iterator) {
			  // Skip hidden files and directories.
			  if ($current->getFilename()[0] === '.') {
			    return FALSE;
			  }
			  if ($current->isDir()) {
			    // Only recurse into intended subdirectories.
			    //return $current->getFilename() === 'assets';
			    return $current->getFilename();
			  }
			  else {
			    // Only consume files of interest.
			    //return strpos($current->getFilename(), 'style') === 0;
			    return $current->getFilename();
			    

			  }
			});
			$iterator = new \RecursiveIteratorIterator($filter);
			$files = array();
			//$files = (object)$files;
			foreach ($iterator as $key => $info) {
				$file = array();
				$file['filename'] = $info->getPathname();
				$file['ext'] = pathinfo($info->getPathname(), PATHINFO_EXTENSION);
				if($file['ext'] === 'css' || $file['ext'] === 'js'){
					$file = (object)$file;
					array_push($files, $file);	
				}
				
			}
			//we sort the files in the right alphabetical order
			usort($files, array($this, 'cmp'));

			if(sizeof($files) > 0){
				$output = NULL;
				foreach ($files as $file) {
					if($type === 'css'){
						$output .= '<link rel="stylesheet" href="'.base_url($file->filename).'">
					';	
					}
					if($type === 'js') {
						$output .= '<script type="text/javascript" src="'.base_url($file->filename).'"></script>
					';
					}
					
				}
				return $output;
			}
			else {return 'false';}

	}



	public function buildMenu($lang = 'hu'){
    $this->db->select('id, name, seo_url, parent, status, language');
    $this->db->where('status', '1');
    $this->db->order_by('page_order', 'asc');
    $MenuList = $this->db->get('page')->result();
    $temp = array();
    foreach($MenuList as $row){
                array_push($temp, json_decode(json_encode($row), TRUE ));
            }
    $temp2 = $this->buildTree($temp, 0);
    return $temp2;
    }

    // Function that recursively build the menu array -> capable of building endless nested menus
    public function buildTree(array &$elements, $parentId = 0) {

        $branch = array();

        foreach ($elements as &$element) {

            if ($element['parent'] == $parentId) {
                $children = $this->buildTree($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                array_push($branch, $element);
                unset($element);
            }
        }
        return $branch;
    }

    function is_logged_in(){
        if($this->session->isLoggedIn != 1){
        	//We set the status header to forbidden. 
        	//$this->output->set_status_header(403);
            redirect(base_url('Auth'),'refresh');
        }
    }

}
