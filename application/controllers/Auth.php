<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct()
    {
        parent:: __construct();

    }
    
        public function index()
        {
            $this->defaultPage();
        // cek validation form login
       $this->form_validation->set_rules('username','Username','required|trim');
       $this->form_validation->set_rules('password','Password','required|trim');
    
       
      //cek apakah form di kirim via post
         if ($this->form_validation->run()== FALSE) {
        //menampilkan view deafult login
        $this->load->view('Auth/index');
    }else{
        // jika form validation berjalan
        $this->_login();
    }
}
private function _login()
{
    // cek input dari form login
    $user = $this->input->post('username',true);
    $pass = $this->input->post('password',true);

   
}

public function defaultPage()
{
    // bila user sudah login,arahkan ke controller home
    if ($this->session->userdata('username')){
    redirect('home');
    }
}   
}