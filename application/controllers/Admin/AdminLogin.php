<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminLogin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('email')) {
            redirect('admin');
        } else {
            $this->load->model('Admin_model', 'am');
        }
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

            $user = $this->am->check_user($input_email);

            if (!$user) {
                $this->session->set_flashdata('login_message', '<div class="alert alert-danger text-center" role="alert">Email yang anda masukkan tidak ditemukan !</div>');
                redirect('Adminlogin');

            } else {

                if (password_verify($input_password, $user['password'])) {
                    $data = [
                        'email' => $user['email']
                    ];
                    $this->session->set_userdata($data);
                    redirect('admin');
                } else {
                    $this->session->set_flashdata('login_message', '<div class="alert alert-danger text-center" role="alert">Password yang anda masukkan salah !</div>');
                    redirect('Adminlogin');
                }
            }
        }
    }
}
