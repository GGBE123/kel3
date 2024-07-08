<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penulis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        // Memeriksa apakah pengguna sudah login menggunakan session 'email'
        if (!$this->session->userdata('email')) {
            // Jika tidak ada session email, arahkan kembali ke halaman login dan tampilkan pesan error
            $this->session->set_flashdata('login_message', '<div class="alert alert-danger text=center" role="alert">Silahkan Login Ulang</div>');
            redirect('PenulisLogin');
        } else {
            // Jika sudah login, load model penulis_model dan buku_model
            $this->load->model('penulis_model', 'pm');
            $this->load->model('buku_model', 'bm');
        }
    }

    public function index()
    {
        // Menyiapkan data untuk halaman utama ('index') penulis
        $data = [
            'dashboard' => 'active', // Status aktif untuk menu dashboard
            'title' => 'penulis-dashboard', // Judul halaman
            'user' => $this->pm->get_user_data($this->session->userdata('email')) // Informasi pengguna
        ];

        // Load view navbar, halaman utama penulis, dan sidebar
        $this->load->view('UserTemplate/navbar', $data);
        $this->load->view('Penulis/index');
        $this->load->view('UserTemplate/sidebar');
    }

    public function pengajuan()
    {
        // Ambil informasi pengguna berdasarkan session email
        $user = $this->pm->get_user_data($this->session->userdata('email'));

        // Memeriksa peran pengguna
        if ($user['role'] == 'Dosen' || $user['role'] == 'Mahasiswa' || $user['role'] == 'Staff') {
            // Jika peran sesuai, siapkan data untuk halaman pengajuan ('pengajuan')
            $data = [
                'data_staff' => 'active', // Status aktif untuk menu data staff
                'title' => 'Penulis-Dashboard', // Judul halaman
                'data_buku' => $this->bm->getAllBuku(), // Data buku dari model buku_model
                'user' => $this->pm->get_user_data($this->session->userdata('email')) // Informasi pengguna
            ];

            // Load view navbar, halaman pengajuan, dan sidebar
            $this->load->view('UserTemplate/navbar', $data);
            $this->load->view('Penulis/Information/pengajuan');
            $this->load->view('UserTemplate/sidebar');
        } else {
            // Jika peran tidak sesuai, arahkan kembali ke halaman login dengan pesan error
            $this->session->set_flashdata('login_message', '<div class="alert alert-danger text=center" role="alert">Akses ditolak, silahkan login kembali</div>');
            $this->session->unset_userdata('email');
            redirect('PenulisLogin');
        }
    }

    public function status()
    {
        // Ambil informasi pengguna berdasarkan session email
        $user = $this->pm->get_user_data($this->session->userdata('email'));

        // Memeriksa peran pengguna
        if ($user['role'] == 'Dosen' || $user['role'] == 'Mahasiswa' || $user['role'] == 'Staff') {
            // Jika peran sesuai, siapkan data untuk halaman status ('status')
            $data = [
                'data_penulis' => 'active', // Status aktif untuk menu data penulis
                'title' => 'Penulis-Dashboard', // Judul halaman
                'user' => $this->pm->get_user_data($this->session->userdata('email')) // Informasi pengguna
            ];

            // Load view navbar, halaman status, dan sidebar
            $this->load->view('UserTemplate/navbar', $data);
            $this->load->view('Penulis/Information/status');
            $this->load->view('UserTemplate/sidebar');
        } else {
            // Jika peran tidak sesuai, arahkan kembali ke halaman login dengan pesan error
            $this->session->set_flashdata('login_message', '<div class="alert alert-danger text=center" role="alert">Akses ditolak, silahkan login kembali</div>');
            $this->session->unset_userdata('email');
            redirect('PenulisLogin');
        }
    }
}
