<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
	
    private $data = array();

    public function __construct() {
        parent::__construct();
             
        $this->load->spark('restclient/2.1.0'); 
    }

    public function index() { 
//        $this->load->library('rest', array(
//            'server'            => 'http://takeab.us/restful/',
//            //'api_key'         => 'Setec_Astronomy'
//            //'api_name'        => 'X-API-KEY'
//            //'http_user'         => 'admin',
//            //'http_pass'         => '1234',
//            //'http_auth'         => 'digest',
//            //'ssl_verify_peer' => TRUE,
//            //'ssl_cainfo'      => '/certs/cert.pem'
//        ));
//        $users = $this->rest->get('api/users/'); 
        $this->load->view('users/index_view');        
    }
    
    public function liste() {
        echo "CI users.liste";
    }
    
    public function details() {
        $this->load->view('users/details_view');
    }
}