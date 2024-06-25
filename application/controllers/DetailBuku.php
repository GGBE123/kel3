<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailBuku extends CI_Controller {
    public function index() {
        $this->load->view('DetailBuku/buku1/index');
        $this->load->view('DetailBuku/buku2/index');
    }

        
    
}   