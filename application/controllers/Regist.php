<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regist extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        // Load the session library
        $this->load->library('session');
        
        // Load the form validation library
        $this->load->library('form_validation');
        
        // Load the model
        $this->load->model('Regist_model', 'rm');
        
        // Check if the user is already logged in
        if ($this->session->userdata('email')) {
            // If user is already logged in, redirect to PenulisLogin controller
            redirect('PenulisLogin');
        }
    }

    public function index()
    {
        // Load the registration view
        $this->load->view('Regist/index');
    }

    public function register()
    {
        // Set validation rules for registration form fields
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('NIP', 'NIP', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            // If form validation fails, reload the registration view with validation errors
            $this->load->view('Regist/index');
        } else {
            // If form validation succeeds, gather input data
            $data = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'NIP' => $this->input->post('NIP'),
                'nama' => $this->input->post('nama'),
                'role' => $this->input->post('role')
            );
            
            // Insert user data into the database using the register_user method from Regist_model
            if ($this->rm->register_user($data)) {
                // If registration is successful, redirect to PenulisLogin controller (login page)
                redirect('PenulisLogin');
            } else {
                // If registration fails, set flashdata error message and reload the registration view
                $this->session->set_flashdata('error', 'Registration failed. Please try again.');
                $this->load->view('Regist/index');
            }
        }
    }
}
