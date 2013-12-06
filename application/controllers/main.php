<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	
    public function __construct() {
        parent::__construct();
    }

    public function index() {        
        $this->_render_page('home/index_view');
    } 
    
    function _render_page($view, $data=NULL, $title=NULL, $header='header_view', $sidebar='sidebar_view', $footer='footer_view', $render=true) {
        $this->template->write('title', 'RESTful App');
        $this->template->write_view('header', $header);
        $this->template->write_view('sidebar', $sidebar);
        $this->template->write_view('footer', $footer);
        $this->template->write_view('content', $view, TRUE);
        
        if($render) $this->template->render();
    }	
}