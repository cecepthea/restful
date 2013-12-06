<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Envoie extends CI_Controller {
	
    private $data = array();

    public function __construct() {
        parent::__construct();
    }

    public function index() { 
        $this->load->view('envoie/index_view');
    }
}