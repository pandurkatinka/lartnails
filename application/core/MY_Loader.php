<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";

class MY_Loader extends MX_Loader {

        // main control constructor: all helpers and libraries that are needed to render the pages comes here
        public $site_set;
        public $contact_info;

    function __construct() {
        parent::__construct();
        $this->initialize_modules_loaded();
    }

	public function viewfront($template_name, $vars = array(), $return = FALSE, $iscrud = 0)
    {
        //Default site data
        $lang = $this->session->lang;
        if(empty($lang)) { $this->session->lang = 'hungarian'; $lang = 'hungarian';}

        $this->site_set = $this->get_settings($lang);

        //print_r($this->session->lang);exit;
        $this->contact_info = $this->get_contact_info($lang);

        $this->session->contact_info = $this->get_contact_info($lang);
        $this->session->site_set = $this->get_settings($lang);


        //Betöltöm a contact/views/js/mail.php-ba függvényhez a validáló szöveget

        //Load header data
        //we need to load the frontend modell here
        $this->load->model('Ownhelpers');
        $this->lang->load('message', 'hungarian');

        //$vars['req_error'] = lang("req_error");

        //$lang = 'hu';

        $vars["head_title"] = $this->site_set->homepage_title." - ".$this->site_set->sitename." - ";
        $vars["head_keywords"] = $this->site_set->homepage_keywords;
        $vars["head_description"] = $this->site_set->homepage_description;

        $this->load->model('Ownhelpers');
        $vars['header_css'] = $this->Ownhelpers->load_css_and_js_to_frontend("css");
        $content  = $this->view('frontend/header', $vars, $return);

        $data['userData'] = $this->setPrimariData();
        /*$content  = $this->view('frontend/primari', $vars, $return);*/


        $content .= $this->view($template_name, $vars, $return);
        
        $vars['footer_js'] = $this->Ownhelpers->load_css_and_js_to_frontend("js");
        $content .= $this->view('frontend/footer', $vars, $return);

        if ($return)
        {
            return $content;
        }
    }

    //admin viewloader loads admin view templates
    //mind, that the second parameter is needed to set to 1 if we are loading a GroceryCrud table. 
    public function viewadmin($template_name, $vars = array(), $return = FALSE, $iscrud = 0)
    {
        $lang = $this->session->lang;
        if(empty($lang)) {$this->session->lang = 'hungarian'; $lang = 'hungarian';}
        $this->site_set = $this->get_settings($lang);
 
        $this->contact_info = $this->get_contact_info($lang);
 
        $this->load->model('Ownhelpers');
        if($iscrud == 1) {
            //if we are loading a grocery crud table, load the crudheader
            $content  = $this->view('inc/crudheader', $vars, $return);
        }else{
            $content  = $this->view('inc/header', $vars, $return);
        }
        
        $content .= $this->view($template_name, $vars, $return);
        //$varsjsfile = isset($vars['jsfile']) ? $vars['jsfile'] : NULL;

        if($iscrud == 1) {
            //if we are loading a grocery crud table, load the crudfooter
            $content .= $this->view('inc/crudfooter', $vars, $return);
        }else{
            $content .= $this->view('inc/footer', $vars, $return);
        }

        if ($return)
        {
            return $content;
        }
    }

    //  Amennyiben Grocery Crud-os tablakat akarunk betolteni, ezt a fuggvenyt kell hasznalnunk
    //  Betolti a crudhoz szukseges JS es CSS fajlokat.
    public function crudloader($template_name, $vars = array(), $return = FALSE)
    {
        $content .= $this->view($template_name, $vars, $return);
        if ($return)
        {
            return $content;
        }
    }

    function setPrimariData(){

            //TODO: Megcsinálni, hogy valós user profilokat mutassunk
            //$profilImage = base_url("userfiles/profile/".$this->session->userID."/profile.png");
            $profilImage = base_url("usersfiles/profile/default.png");

            $messages = array("foo", "bar", "hello", "world");
            $notifi = array("foo", "bar", "hello", "world");

            $userData = array(
                "username" => $this->session->username,
                "fullName" => $this->session->username,
                "messages" => $messages,
                "notifi" => $notifi,
                "profileImg" => $profilImage,);

            return $userData;
    }

    function get_settings($lang){
        $this->db->where('language', $lang);
        $query = $this->db->get('settings');
        if($query->num_rows() > 0 ){
            return $query->row();
        }
    }
    function get_contact_info($lang){
        $this->db->where('language_id', $lang);
        $query = $this->db->get('contact_info');
        //print_r($query->row());exit;
        if($query->num_rows() > 0 ){
            return $query->row();
        }
    }

    //Option to load interfaces from the application/interfaces folder
    public function iface($strInterfaceName) {

        require_once APPPATH . '/interfaces/' . $strInterfaceName . '.php';

    }
    public function initialize_modules_loaded(){
        $this->_ci_cached_vars['modules'] = array();
        //$this->_ci_cached_vars['footer_js'] = '';
    }
}