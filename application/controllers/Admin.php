<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// bebasas 
class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('AdminTemplate/navbar');
		$this->load->view('Admin/index');
		$this->load->view('AdminTemplate/sidebar');
	}
	
}