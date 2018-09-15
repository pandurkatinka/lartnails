<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Newsletter extends MX_Controller {

    /*  Newsletter contructor
    *
    */
    function __construct() {
        parent::__construct();
        $this->load->model('Newsletter_model');
    }

    function index() {

      $data = null;
      $this->load->viewfront('index', $data, FALSE, 0);
    }

    function feliratkozas() {
      $url = $this->uri->segment(1);
      $nev = $this->input->post("nev");
      $mail = $this->input->post("mail");
      $sub = array(
          'name' => $nev,
          'email' => $mail,
          'date' => date("Y.m.d"),
          'active' => 1
      );

      if ($nev != null && $mail != null) {
         // $data['site']->tartalom = "Köszönjük, hogy feliratkozott hírlevelünkre!";
          $this->db->insert('subscribers', $sub);
      } else {
        //  $data['site']->tartalom = "Hiba történt! Kérjük próbálja újra később!";
      }
      redirect(base_url($url), 'refresh');
    }

   function leiratkozas() {
     $url = $this->uri->segment(1);
  		$nev = $this->input->post('nev');
  		$mail = $this->input->post('mail');
  		$this->Newsletter_model->leiratkozas($nev,$mail);
  		redirect(base_url($url), 'refresh');
  	}

}
