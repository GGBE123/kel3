<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailBuku extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('buku_model','bm');
    }
    public function index()
    {
        // get all data siswa dari modelspp

        $this->load->view('LayoutTemplate/navbar');
		$this->load->view('list_buku/index');
		$this->load->view('LayoutTemplate/footer');
    }
    
    
}   