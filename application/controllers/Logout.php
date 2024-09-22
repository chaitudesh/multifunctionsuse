<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function index()
	{
        
        $this->load->helper('url');
        $this->load->library('session'); 
        $this->session->set_userdata('id');
		$this->session->unset_userdata('firastname');
		$this->session->set_userdata('lastname');
		$this->session->set_userdata('type');
		$this->session->set_userdata('email');
		$this->session->set_userdata('is_verify');
        redirect('login');
    }
}