<?php
class Penulis_model extends CI_Model
{
    private $PENULIS_USER = 'penulis'; // Nama tabel dalam database

    public function get_user_data($email)
    {
        // Mengambil data pengguna berdasarkan email dari tabel 'penulis'
        return $this->db->get_where($this->PENULIS_USER, ['email' => $email])->row_array();
    }

    public function check_user($email)
    {
        // Memeriksa keberadaan pengguna berdasarkan email di tabel 'penulis'
        $user = $this->db->get_where($this->PENULIS_USER, ['email' => $email])->row_array();

        if ($user) {
            // Jika pengguna ditemukan, kembalikan data pengguna
            return $user;
        } else {
            // Jika pengguna tidak ditemukan, kembalikan false
            return false;
        }
    }

    public function get_penulis()
    {
        // Mengambil semua data dari tabel 'penulis' dan mengembalikan dalam bentuk array objek
        return $this->db->get('penulis')->result();
    }

    public function delete_penulis($id)
    {
        // Menghapus data penulis berdasarkan ID dari tabel 'penulis'
        $this->db->delete($this->PENULIS_USER, ['nip_m' => $id]);
    }
}
