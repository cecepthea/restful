<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['header'] = array('mainmenu' => array(
                (object) array(
                    "name" => "Contacts",
                    "slug" => "contacts",
                ),
                (object) array(
                    "name" => "Envois",
                    "slug" => "envois",
                ),
                (object) array(
                    "name" => "Debug",
                    "slug" => "debug",
                ),
        ));
        $this->_render_page('home/index_view', $data, 'restfulApp');
    }

    function _render_page($view, $data = NULL, $title = NULL, $header = 'header_view', $sidebar = 'sidebar_view', $footer = 'footer_view', $render = true) {
        $this->template->write('title', $title);
        $headerdata = $data['header'];
        
        $this->template->write_view('header', $header, $headerdata);
        $this->template->write_view('sidebar', $sidebar);
        $this->template->write_view('footer', $footer);
        $this->template->write_view('content', $view, TRUE);

        if ($render)
            $this->template->render();
    }

}