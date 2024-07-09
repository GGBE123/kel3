<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penulis extends CI_Controller
{
    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('login_message', '<div class="alert alert-danger text=center" role="alert">Silahkan Login Ulang</div>');
            redirect('PenulisLogin');
        } else {
            $this->load->model('penulis_model', 'pm');
            $this->load->model('buku_model', 'bm');
        }
    }

    public function index() {
        $penulis = $this->pm->get_user_data($this->session->userdata('email'));
        $nip_m = $penulis['nip_m'];

        $data = [
            'dashboard' => 'active',
            'title' => 'penulis-dashboard',
            'user' => $penulis,
            'countProses' => $this->bm->countBooksByStatusForPenulis('not reviewed', $nip_m),
            'countReview' => $this->bm->countBooksByStatusForPenulis('being reviewed', $nip_m),
            'countDiajukanIsbn' => $this->bm->countBooksByStatusForPenulis('Sedang diajukan ke ISBN', $nip_m),
            'countDiterima' => $this->bm->countBooksByStatusForPenulis('accepted', $nip_m),
            'countDitolak' => $this->bm->countBooksByStatusForPenulis('denied', $nip_m)
        ];

        $this->load->view('UserTemplate/navbar', $data);
        $this->load->view('Penulis/index', $data);
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
