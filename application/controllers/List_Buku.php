<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_Buku extends CI_Controller {
    public function index()
	{
		$this->load->view('LayoutTemplate/navbar');
		$this->load->view('list_buku/index');
		$this->load->view('LayoutTemplate/footer');
	}
}
