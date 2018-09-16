<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Login Model
 *
 *
 * @package    	
 */

// ------------------------------------------------------------------------
class Auth_model extends CI_Model  {

	function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //login handling
    function do_login($email, $password, &$response){
        
        //We grab the hash from the database and compare it to the password the user put in to the input field 
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        
        if($query->num_rows() == 1){
            
            //we get the hash from the database
            $hash = $query->row()->password;
            
            //we check if the pw is valid or not
            if($this->verify_pw($password, $hash)){
                //if the pw is valid:
                //we set the isLoggedIn session variable to true
                //we also save the name, user_id to session
                $this->session->isLoggedIn = 1;
                $this->session->name = $query->row()->name;
                $this->session->user_id = $query->row()->user_id;
                //after all done, we redirect to the admin page
                $response = 'Helyes jelszó!';
                return 1;
            } else {
                $this->session->isLoggedIn = 0;
                $response = 'Helytelen jelszó!';
                return 0;
                }

        } else { 
            $this->session->isLoggedIn = 0;
            $response = 'Nem regisztrált email cím!';
            return 0;
        }

    }

    //logout handling
    function do_logout(){
        $this->session->unset_userdata('isLoggedIn');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('user_id');
        $this->session->sess_destroy();
        redirect(base_url(), 'refresh');
    }

    //this helper function hashes the pw to the database
    function hash_pw($password){
        /**
         * In this case, we want to increase the default cost for BCRYPT to 10.
         * Note that we also switched to BCRYPT, which will always be 60 characters.
         */
        $options = [
            'cost' => 10,
        ];
        $hashedpw = password_hash($password, PASSWORD_BCRYPT, $options);
        return $hashedpw;
    }

    /**
     * Verifies if the user input pw matches the hash provided from the database.
     * @param  [string] $password [userinput]
     * @param  [string] $hash     [hash from the database for that email address]
     * @return [boolean]           [if the 2 matches return true, else return false]
     */
    function verify_pw($password, $hash){
        if(password_verify($password, $hash)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Creates a new strong randomly generated password upon the users pw is lost
     * @return [type] [description]
     */
    function create_new_pass(){
        $factory = new RandomLib\Factory;
        $generator = $factory->getMediumStrengthGenerator();
        $temppass = $generator->generateString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+/!@\"#$%&[]{}?|');
        return $temppass;
    }



    /**
     * handles the password forget event, if the e-mail the user provided is registered, it registers a new pw, and saves it into the users table
     * @return [type] [description]
     */
    function forget_pw($email, &$response){
        //checking if the user exists in the database
        $this->db->where('email', $email);
        $user_query = $this->db->get('users');
        if($user_query->num_rows() > 0 ){
            //generate the new pass
            $newpass = $this->create_new_pass();
            //register the new pass
            $this->register_new_pass($email, $newpass);
            $response = 'Az új jelszót kiküldtük a megadott email címre.'
            . 'Kód-teszt: '. $newpass
            ;
            return 1;

        }else{
            $response = 'Nincs ilyen email regisztrálva adatbázisunkban!';
            return 0;
        }
    }

    //Registers the new password in the database
    function register_new_pass($email, $pass){
        //Getting the old record from the database
        $this->db->where('email', $email);
        $olduser_array = $this->db->get('users')->row_array();
        //hashing the new pass for the database
        $newpass = $this->hash_pw($pass);

        $olduser_array['password'] = $newpass;

        //updating the new password in the database
        $this->db->where('email', $email);
        $this->db->update('users', $olduser_array);

        //Sending email with the new password to the user
        
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://w1.cpserver.net',
            'smtp_port' => 465,
            'smtp_user' => 'noreply@popularmarketing.hu',
            'smtp_pass' => '0O4*p[0O~o*Q',
            'mailtype'  => 'html',
        );
        $this->load->library('email',$config);
        $this->email->set_newline("\r\n");
        $this->email->from('noreply@popularmarketing.hu', 'PM - Elveszett jelszó');
        $this->email->to($email);
        $this->email->subject('Jelszócsere');
        $this->email->message('Az Ön jelszavát lecseréltük. Az új jelszó amivel bejelentkezhet a következő:<br>' .
            '<h2>'. $pass .'<h2>');

        $this->email->send();
    }

    function setNewPass($id, $newpass){
        
        $newpass = $this->hash_pw($newpass);
        $olduser_array['password'] = $newpass; 
        $this->db->where('userID', $id);
        $this->db->update('users', $olduser_array);
        return 1;
    }
}

