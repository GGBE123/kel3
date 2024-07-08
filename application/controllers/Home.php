<?php
// Memastikan file ini hanya dapat diakses melalui aplikasi CodeIgniter
defined('BASEPATH') OR exit('No direct script access allowed');

// Definisi class Home yang merupakan controller utama untuk halaman depan
class Home extends CI_Controller {

    // Method default yang akan dipanggil saat URL http://example.com/home diakses
    public function index()
    {
        // Memuat view navbar untuk bagian header
        $this->load->view('LayoutTemplate/navbar');

        // Memuat view index untuk halaman depan utama
        $this->load->view('home/index');

        // Memuat view footer untuk bagian bawah halaman
        $this->load->view('LayoutTemplate/footer');
    }
    
}
?>
