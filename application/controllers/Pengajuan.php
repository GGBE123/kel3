<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('login_message', '<div class="alert alert-danger text=center" role="alert">Silahkan Login Ulang</div>');
            redirect('adminLogin');
        } else {
            $this->load->model('Admin_model', 'am');
            $this->load->model('Buku_model'); // Load the model
        }
    }

    public function index()
    {
        $this->load->view('penulis/Information/pengajuan');
    }

    public function submit()
    {
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
            $this->session->set_flashdata('penulis_message', '<script>Swal.fire({title: "Success!",text: "Your data is submitted!",icon: "success"});</script>');
            redirect('Penulis/pengajuan');
        } else {
            // Redirect to an error page
            $this->load->view('formISBN/error');
        }
    }

    public function updateSiswa($id)
    {
        $this->form_validation->set_rules('nis', 'NIS', 'trim');
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'No.Telpon', 'is_natural|trim');

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'Update Data Siswa';
            // get All Data siswa by id dari modelSiswa
            $data['siswa'] = $this->sm->getSiswaById($id);
            $data['kelas'] = $this->sm->getAllKelas();
            $data['spp'] = $this->sm->getAllSpp();

            $this->load->view('template/sidebar');
            $this->load->view('template/navbar');
            $this->load->view('siswa/siswa-update', $data);
            $this->load->view('template/footer');
        } else {

            // update data siswa melalui model siswa
            $this->sm->updateSiswa();

            $this->session->set_flashdata(
                'siswa_message',
                '<div class="alert alert-success" role="alert">
                Data Berhasil Diupdate
                </div>'
            );
            redirect('siswa');
        }
    }
}
