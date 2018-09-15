<?php
class Langswitch extends MX_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    function switchLanguage($language = "") {
        $language = ($language != "") ? $language : "hungarian";
        $this->session->lang = $language;
        redirect(base_url());
    }
}
