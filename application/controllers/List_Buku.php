<?php
// Memastikan file ini hanya dapat diakses melalui aplikasi CodeIgniter
defined('BASEPATH') OR exit('No direct script access allowed');

// Definisi class List_Buku yang merupakan controller untuk menangani halaman daftar buku
class List_Buku extends CI_Controller {

    // Konstruktor untuk inisialisasi
    public function __construct() {
        parent::__construct();
        // Memuat model 'buku_model' dengan alias 'bm'
        $this->load->model('buku_model','bm');
    }

    // Method default yang akan dipanggil saat URL http://example.com/list_buku diakses
    public function index() {
        
        // Memuat view navbar untuk bagian header
        $this->load->view('LayoutTemplate/navbar');
        
        // Memuat view index untuk halaman daftar buku
		$this->load->view('list_buku/index');
		
        // Memuat view footer untuk bagian bawah halaman
		$this->load->view('LayoutTemplate/footer');
    }
 
}
?>
