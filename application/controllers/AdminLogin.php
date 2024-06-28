<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogin extends CI_Controller {
    public function index(){
        $this->load->view('AdminLogin/index');
    }

}