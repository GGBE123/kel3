<?php
class Admin_model extends CI_Model
{
    private $STAFF_USER = 'staff_perpustakaan'; // Nama tabel dalam database

    public function get_user_data($email)
    {
        // Mengambil data pengguna (staff perpustakaan) berdasarkan email dari tabel 'staff_perpustakaan'
        return $this->db->get_where($this->STAFF_USER, ['email' => $email])->row_array();
    }

    public function check_user($email)
    {
        // Memeriksa keberadaan pengguna (staff perpustakaan) berdasarkan email di tabel 'staff_perpustakaan'
        $user = $this->db->get_where($this->STAFF_USER, ['email' => $email])->row_array();
        
        // Mengembalikan $user jika ditemukan, jika tidak ditemukan mengembalikan false
        return $user ?: false;
    }

    public function get_staff()
    {
        // Mengambil semua data dari tabel 'staff_perpustakaan' dan mengembalikannya dalam bentuk array objek
        return $this->db->get('staff_perpustakaan')->result();
    }

    public function insert_staff($data)
    {
        // Memasukkan data staff baru ke dalam tabel 'staff_perpustakaan'
        $this->db->insert($this->STAFF_USER, $data);
    }

    public function update_staff($id, $data)
    {
        // Memperbarui data staff berdasarkan ID di dalam tabel 'staff_perpustakaan'
        $this->db->where('id', $id);
        $this->db->update($this->STAFF_USER, $data);
    }

    public function delete_staff($id)
    {
        // Menghapus data staff berdasarkan ID di dalam tabel 'staff_perpustakaan'
        $this->db->delete($this->STAFF_USER, ['id_staff' => $id]);
    }
}
