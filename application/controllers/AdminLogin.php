<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminLogin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model','am');
    }
    public function index()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('AdminLogin/index');
        } else {
            $input_email = $this->input->post('email', true);
            $input_password = $this->input->post('password', true);

            if ($this->am->check_user($input_email)) {
                echo '1';
            }else{
                echo '2';
            }
        }
    }
}
