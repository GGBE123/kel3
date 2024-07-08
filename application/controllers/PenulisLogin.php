<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenulisLogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        // Memeriksa apakah pengguna sudah login menggunakan session 'email'
        if ($this->session->userdata('email')) {
            // Jika sudah login, redirect ke halaman Penulis
            redirect('Penulis');
        } else {
            // Jika belum login, load model Penulis_model untuk proses autentikasi
            $this->load->model('Penulis_model', 'pm');
        }
    }

    public function index()
    {
        // Validasi form login menggunakan library form_validation dari CodeIgniter
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi form gagal, tampilkan kembali halaman login
            $this->load->view('PenulisLogin/index');
        } else {
            // Jika validasi form berhasil

            // Ambil nilai email dan password dari inputan form
            $input_email = $this->input->post('email', true);
            $input_password = $this->input->post('password', true);

            // Cek apakah user dengan email yang dimasukkan ada dalam database
            $user = $this->pm->check_user($input_email);

            if (!$user) {
                // Jika user tidak ditemukan, tampilkan pesan error dan redirect kembali ke halaman login
                $this->session->set_flashdata('login_message', '<div class="alert alert-danger text-center" role="alert">Email yang anda masukkan tidak ditemukan !</div>');
                redirect('Penulislogin');
            } else {
                // Jika user ditemukan, bandingkan password yang dimasukkan dengan password hash yang tersimpan
                if (password_verify($input_password, $user['password'])) {
                    // Jika password cocok, set session 'email' dengan email user
                    $data = [
                        'email' => $user['email']
                    ];
                    $this->session->set_userdata($data);
                    // Redirect ke halaman Penulis setelah login berhasil
                    redirect('Penulis');
                } else {
                    // Jika password tidak cocok, tampilkan pesan error dan redirect kembali ke halaman login
                    $this->session->set_flashdata('login_message', '<div class="alert alert-danger text-center" role="alert">Password yang anda masukkan salah !</div>');
                    redirect('Penulislogin');
                }
            }
        }
    }
}
