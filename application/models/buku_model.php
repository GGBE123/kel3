<?php
class Buku_model extends CI_Model
{
    private $BUKU_DB = 'buku';
    private $MILIK_DB = 'milik';
    private $PENULIS_DB = 'penulis';

    public function getAllBuku()
    {
        $email_user = $this->session->userdata('email');
        return $this->db->query("SELECT * FROM $this->MILIK_DB a, $this->PENULIS_DB b, $this->BUKU_DB c WHERE a.nip_m = b.nip_m AND a.id_buku = c.id_buku AND b.email = '$email_user' ORDER BY c.id_buku DESC")->result_array();
    }

    public function getAllSubmissions()
    {
        return $this->db->query("SELECT * FROM $this->MILIK_DB a, $this->PENULIS_DB b, $this->BUKU_DB c WHERE a.nip_m = b.nip_m AND a.id_buku = c.id_buku ORDER BY c.id_buku DESC")->result_array();
    }

    public function insertBuku()
    {
        $data_buku = [
            'pengarang' => $this->input->post('pengarang'),
            'judul' => $this->input->post('judul'),
            'halaman' => $this->input->post('halaman'),
            'media' => $this->input->post('media'),
            'sinopsis' => $this->input->post('sinopsis')
        ];

        $insert_buku = $this->db->insert($this->BUKU_DB, $data_buku);

        if ($insert_buku) {
            $id_buku = $this->db->query("SELECT a.id_buku FROM $this->BUKU_DB a ORDER BY a.id_buku DESC")->row_array();
            $user  = $this->db->get_where($this->PENULIS_DB, ['email' => $this->session->userdata('email')])->row_array();
            $nip_m = $user['nip_m'];

            $data_milik = [
                "nip_m" => $nip_m,
                "id_buku" => $id_buku['id_buku']
            ];

            $insert_milik = $this->db->insert($this->MILIK_DB, $data_milik);

            if ($insert_milik) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    // New method to get all submissions
}
?>
