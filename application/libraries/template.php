<?php

class template {

    protected $_ci;

    function __construct() {
        $this->_ci = &get_instance();
    }

    function guest($template, $data = null) {
        $data['_content'] = $this->_ci->load->view($template, $data, true);
        $data['_head'] = $this->_ci->load->view('Template/Head', $data, true);
        $data['_sidebar'] = $this->_ci->load->view('Template/Sidebar', $data, true);
        $data['_navbar'] = $this->_ci->load->view('Template/Navbar', $data, true);
        $data['_footer'] = $this->_ci->load->view('Template/Footer', $data, true);
        $this->_ci->load->view('Template/Body.php', $data);
    }
}