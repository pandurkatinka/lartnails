<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends MX_Controller {

    /*  Login constructor
    *   Handles the login form, and the login
    */
    function __construct() {
        parent::__construct();

        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        $this->load->model('Admin_model');

        //We perform the login check, if the user is not logged in, we redirect him to the login page
        $this->Admin_model->is_logged_in();

        //TODO: Permission control for the admin. if needed-> now its not needed
    }

    public function index(){

        $output['user'] = $this->Admin_model->get_user();

        //If you have to display grocery crud in the content panel:
        /*
        $crud = new grocery_CRUD();
        $crud->set_table('users');
        $crud->set_theme('bootstrap');
        $crud->set_subject('Felhasználó Jogosultságok');
        $output = $crud->render();
        $this->load->viewadmin('index', $output, FALSE, 1);
        */

        //If you have to display other modules in the content panel

        $output = new stdClass();
        $output->output = '';

        $this->load->viewadmin('index', $output, FALSE, 0);
    }

    public function users(){
         $output['user'] = $this->Admin_model->get_user();

        //If you have to display grocery crud in the content panel:

        $crud = new grocery_CRUD();
        $crud->set_table('users');
        $crud->set_theme('bootstrap');
        $crud->set_subject('Felhasználók');
        $crud->display_as(array(
                            'name' => 'Név',
                            'password' => 'Jelszó',
                            'perm' => 'Jogosultság',
                            'active_domain' => 'Aktív domain',
            )
            );
        $crud->unset_columns('perm', 'active_domain','password');
        $crud->field_type('password', 'password');
        $crud->field_type('perm', 'hidden');
        $crud->field_type('active_domain', 'hidden');
        $crud->callback_before_insert(array($this, '__hashpwtodb'));
        $crud->callback_before_update(array($this, '__hashpwtodb'));

        $output = $crud->render();
        $this->load->viewadmin('index', $output, FALSE, 1);
        $data['user'] = $this->Admin_model->get_user();
        $data['settings'] = $this->Admin_model->get_settings();
        $data['callModule'] = $this->uri->segment(2);

        //$this->load->viewadmin('index', $data, FALSE, 1);

    }

    public function settings(){
         $output['user'] = $this->Admin_model->get_user();

        //If you have to display grocery crud in the content panel:

        $crud = new grocery_CRUD();
        $crud->set_table('settings');
        $crud->set_theme('bootstrap');
        $crud->set_subject('Honlap Beállítások');
        $crud->display_as(array(
                            'sitename' => 'Honlapnév',
                            'language' => 'Nyelv',
                            'homepage_title' => 'Honlap főcím',
                            'homepage_keywords' => 'Kulcsszavak',
                            'homepage_description' => 'Leírás',
                            'google_analytics' => 'Google analytics',
            )
            );
        $output = $crud->render();
        $this->load->viewadmin('index', $output, FALSE, 1);
    }

    public function contact(){
         $output['user'] = $this->Admin_model->get_user();
        //If you have to display grocery crud in the content panel:
        $output = Modules::run('contact/contact_admin/index');
        $this->load->viewadmin('index', $output, FALSE, 1);
    }

    public function pages(){
         $output['user'] = $this->Admin_model->get_user();

        //If you have to display grocery crud in the content panel:
        $output = Modules::run('pages/pages_admin/index');
        $this->load->viewadmin('index', $output, FALSE, 1);
    }

    public function gallery(){
         $output['user'] = $this->Admin_model->get_user();

        //If you have to display grocery crud in the content panel:
        $output = Modules::run('gallery/gallery_admin/index');
        $this->load->viewadmin('index', $output, FALSE, 1);
    }

    public function gallery_image_upload(){
         $output['user'] = $this->Admin_model->get_user();

        //If you have to display grocery crud in the content panel:
        $output = Modules::run('gallery/gallery_admin/gallery_image_upload');
        $this->load->viewadmin('index', $output, FALSE, 1);
    }

    public function product_category(){
         $output['user'] = $this->Admin_model->get_user();

        //If you have to display grocery crud in the content panel:
        $output = Modules::run('products/products_admin/index');
        $this->load->viewadmin('index', $output, FALSE, 1);
    }

    public function products(){
         $output['user'] = $this->Admin_model->get_user();

        //If you have to display grocery crud in the content panel:
        $output = Modules::run('products/products_admin/products');
        $this->load->viewadmin('index', $output, FALSE, 1);
    }

    public function product_image_upload(){
         $output['user'] = $this->Admin_model->get_user();

        //If you have to display grocery crud in the content panel:
        $output = Modules::run('products/products_admin/product_image_upload');
        $this->load->viewadmin('index', $output, FALSE, 1);
    }

    public function news_category(){
         $output['user'] = $this->Admin_model->get_user();

        //If you have to display grocery crud in the content panel:
        $output = Modules::run('news/news_admin/index');
        $this->load->viewadmin('index', $output, FALSE, 1);
    }

    public function news(){
         $output['user'] = $this->Admin_model->get_user();

        //If you have to display grocery crud in the content panel:
        $output = Modules::run('news/news_admin/news');
        $this->load->viewadmin('index', $output, FALSE, 1);
    }

    public function news_gallery(){
         $output['user'] = $this->Admin_model->get_user();

        //If you have to display grocery crud in the content panel:
        $output = Modules::run('news/news_admin/news_gallery');
        $this->load->viewadmin('index', $output, FALSE, 1);
    }

    public function say_about_us(){
         $output['user'] = $this->Admin_model->get_user();

        //If you have to display grocery crud in the content panel:
        $output = Modules::run('say_about_us/say_about_us_admin/index');
        $this->load->viewadmin('index', $output, FALSE, 1);
    }

    public function coworkers(){
         $output['user'] = $this->Admin_model->get_user();

        //If you have to display grocery crud in the content panel:
        $output = Modules::run('coworkers/Coworkers_admin/index');
        $this->load->viewadmin('index', $output, FALSE, 1);
    }

    public function navigation(){
        $output['user'] = $this->Admin_model->get_user();

        //If you have to display grocery crud in the content panel:
        //$output = Modules::run('navigation/navigation_admin/index');
        $output = new stdClass();
        $output->output = 'A menük egyelőre nem elérhetőek';//Modules::run('auth/auth/index');
        $this->load->viewadmin('index', $output, FALSE, 0);
    }

    public function slider(){
       $output['user'] = $this->Admin_model->get_user();

        //If you have to display grocery crud in the content panel:
        $output = Modules::run('slider/slider_admin/index');
        $this->load->viewadmin('index', $output, FALSE, 1);
    }

    public function subscribers() {

      //Speaks for itself  :)

         $output['subscribers'] = $this->Admin_model->get_subscriber();

        //If you have to display grocery crud in the content panel:

        $crud = new grocery_CRUD();
        $crud->set_table('subscribers');
        $crud->set_theme('bootstrap');
        $crud->set_subject('Feliratkozók');
        $crud->display_as(array(
                            'name' => 'Név',
                            'email' => 'E-mail',
                            'date' => 'Dátum',
                            'active' => 'Aktív',
            )
            );
        $output = $crud->render();
        $this->load->viewadmin('index', $output, FALSE, 1);

    }

    public function newsletter() {

        $output['newsletter'] = $this->Admin_model->get_newsletter();

		    $crud = new grocery_CRUD();
        $crud->set_table('newsletter');
        $crud->set_theme('bootstrap');
        $crud->set_subject('Hírlevél');
        $crud->unset_add();
        $crud->display_as(array(
                            'subject' => 'Tárgy',
                            'message' => 'Üzenet',
            )
            );

		    $output = $crud->render();
        $this->load->viewadmin('index', $output, FALSE, 1);

	}

  public function newsletter_send(){

    $hirlevel = $this->db->query("SELECT * FROM `newsletter`")->row();
		$body_alap = $hirlevel->message;
		$targy_alap = $hirlevel->subject;
        $data['oldaltitle'] = "Hírlevelek kiküldése";
        $data['leiras'] = "Hírlevelek sikeresen ki lettek küldve!";
        $data['emailek'] = $this->db->query("SELECT * FROM `subscribers`")->result();
        //If category -> then need a table join and another table...
		//$data['emailek2'] = $this->db->query("SELECT * FROM `feliratkozok` JOIN `feliratkozok_kategoria` ON `feliratkozok_kategoria`.`id` = `feliratkozok`.`csoport`")->result();

        $fullEmails = "";
        $sqlStr = "";
        //if($this->input->get("send") == "true"){
		$targy = "";
		$body = "";
        foreach($data['emailek'] as $row){

			if($row->active == '1') {

			$this->load->library('email');

			$this->email->set_mailtype("html");

            $this->email->from('popularmarketing@benedek.hu', 'Popularmarketing Benedek');
            $this->email->to($row->email);

			$targy = str_replace("*NEV*", $row->name, $targy_alap);
            $this->email->subject($targy);
			$body = str_replace("*NEV*", $row->name, $body_alap);
            $this->email->message($body);

            $this->email->send();
            }
        }

        $data['fullemailsRespond'] =  $fullEmails;
          redirect('admin/subscribers', 'refresh');
    }

    public function __hashpwtodb($primary_key) {
            $primary_key['password'] = $this->Admin_model->hash_pw($primary_key['password']);
            return $primary_key;
    }

}
