<?php
// Definisi class Logout yang merupakan controller untuk proses logout
class Logout extends CI_Controller
{

    // Method index untuk proses logout dan memberikan pesan berhasil
    public function index()
    {
        // Menghapus data session 'email'
        $this->session->unset_userdata('email');
        
        // Menyimpan pesan flash untuk ditampilkan setelah redirect
        $this->session->set_flashdata('login_message','<div class="alert alert-success text-center" role="alert">Berhasil Keluar</div>');
        
        // Melakukan redirect ke halaman 'home'
        redirect('home');
    }

    // Method redirect untuk proses logout tanpa menyimpan pesan flash
    public function redirect()
    {
        // Menghapus data session 'email'
        $this->session->unset_userdata('email');
        
        // Melakukan redirect ke halaman 'home'
        redirect('home');
    }

}
?>
