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
            redirect('PenulisLogin');
        }
    }

    public function index()
    {
        $this->load->view('Regist/index');
    }

    public function register()
    {
        // Set validation rules
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('NIP', 'NIP', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, load the registration view again
            $this->load->view('Regist/index');
        } else {
            // Validation passed, proceed with registration
            $data = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'NIP' => $this->input->post('NIP'),
                'nama' => $this->input->post('nama'),
                'role' => $this->input->post('role')
            );
            
            // Insert the data into the database
            if ($this->rm->register_user($data)) {
                // Registration successful, redirect to login page
                redirect('PenulisLogin');
            } else {
                // Registration failed, show an error message
                $this->session->set_flashdata('error', 'Registration failed. Please try again.');
                $this->load->view('Regist/index');
            }
        }
    }
}