<?php
class Penulis_model extends CI_Model
{
    private $PENULIS_USER = 'penulis'; // Nama tabel dalam database

    public function get_user_data($email)
    {
        // Mengambil data pengguna berdasarkan email
        return $this->db->get_where($this->PENULIS_USER, ['email' => $email])->row_array();
    }

    public function check_user($email)
    {
        // Memeriksa keberadaan pengguna berdasarkan email
        $user = $this->db->get_where($this->PENULIS_USER, ['email' => $email])->row_array();

        if ($user) {
            // Jika pengguna ditemukan, kembalikan data pengguna
            return $user;
        } else {
            // Jika pengguna tidak ditemukan, kembalikan false
            return false;
        }
    }
}
