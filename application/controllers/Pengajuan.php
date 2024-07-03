<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Buku_model'); // Load the model
    }

    public function index() {
        $this->load->view('formISBN/index');
    }

    public function submit() {
        // Get form data
        $data = [
            'pengarang' => $this->input->post('pengarang'),
            'judul' => $this->input->post('judul'),
            'halaman' => $this->input->post('halaman'),
            'media' => $this->input->post('media'),
            'sinopsis' => $this->input->post('sinopsis'),
            'nip_m' => $this->session->userdata('nip_m') // assuming nip_m is stored in session
        ];

        // Call the model method to insert the data
        $inserted = $this->Buku_model->insertBuku($data);

        if ($inserted) {
            // Redirect to a success page
            $this->load->view('formISBN/success');
        } else {
            // Redirect to an error page
            $this->load->view('formISBN/error');
        }
    }
}
