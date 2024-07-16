<?php
class Buku_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private $BUKU_DB = 'buku';
    private $MILIK_DB = 'milik';
    private $PENULIS_DB = 'penulis';

    public function update_book_status($id_buku, $data)
    {
        $this->db->where('id_buku', $id_buku);
        return $this->db->update('milik', $data);
    }

    public function getAllBuku()
    {
        $email_user = $this->session->userdata('email');
        return $this->db->query("
            SELECT c.id_buku, c.judul, c.halaman, c.media, c.sinopsis, 
                   GROUP_CONCAT(DISTINCT b.nama ORDER BY b.nama ASC SEPARATOR ', ') as pengarang,
                   MAX(a.id_milik) as id_milik
            FROM $this->MILIK_DB a
            JOIN $this->PENULIS_DB b ON a.nip_m = b.nip_m
            JOIN $this->BUKU_DB c ON a.id_buku = c.id_buku
            WHERE c.id_buku IN (
                SELECT a2.id_buku
                FROM $this->MILIK_DB a2
                JOIN $this->PENULIS_DB b2 ON a2.nip_m = b2.nip_m
                WHERE b2.email = '$email_user'
            )
            GROUP BY c.id_buku
            ORDER BY c.id_buku DESC
        ")->result_array();
    }

    public function getAllSubmissions()
    {
        return $this->db->query("
            SELECT 
                c.id_buku, 
                GROUP_CONCAT(DISTINCT a.nip_m ORDER BY a.nip_m ASC SEPARATOR ', ') as nip_m,
                GROUP_CONCAT(DISTINCT b.nama ORDER BY b.nama ASC SEPARATOR ', ') as pengarang, 
                c.judul, 
                c.halaman, 
                c.media,
                c.sinopsis,
                MAX(a.status) as status
            FROM $this->MILIK_DB a
            JOIN $this->PENULIS_DB b ON a.nip_m = b.nip_m
            JOIN $this->BUKU_DB c ON a.id_buku = c.id_buku
            GROUP BY c.id_buku
            ORDER BY c.id_buku DESC
        ")->result_array();
    }

    public function insertBuku()
    {
        $data_buku = [
            'judul' => $this->input->post('judul'),
            'halaman' => $this->input->post('halaman'),
            'media' => $this->input->post('media'),
            'sinopsis' => $this->input->post('sinopsis')
        ];

        // Handle file uploads for isi_buku and cover_buku
        $isi_buku_file = $_FILES['isi_buku'];
        $cover_buku_file = $_FILES['cover_buku'];

        if ($isi_buku_file['size'] > 0) {
            $isi_buku_upload_path = './uploads/isi_buku/';
            $isi_buku_file_name = $isi_buku_file['name'];
            $isi_buku_file_tmp = $isi_buku_file['tmp_name'];
            move_uploaded_file($isi_buku_file_tmp, $isi_buku_upload_path . $isi_buku_file_name);
            $data_buku['isi_buku'] = $isi_buku_file_name;
        }

        if ($cover_buku_file['size'] > 0) {
            $cover_buku_upload_path = './uploads/cover_buku/';
            $cover_buku_file_name = $cover_buku_file['name'];
            $cover_buku_file_tmp = $cover_buku_file['tmp_name'];
            move_uploaded_file($cover_buku_file_tmp, $cover_buku_upload_path . $cover_buku_file_name);
            $data_buku['cover_buku'] = $cover_buku_file_name;
        }

        $insert_buku = $this->db->insert($this->BUKU_DB, $data_buku);

        if ($insert_buku) {
            $id_buku = $this->db->insert_id();
            $user = $this->db->get_where($this->PENULIS_DB, ['email' => $this->session->userdata('email')])->row_array();
            $nip_m = $user['nip_m'];

            // Insert logged-in user as the primary writer
            $data_milik = [
                "nip_m" => $nip_m,
                "id_buku" => $id_buku
            ];
            $this->db->insert($this->MILIK_DB, $data_milik);

            // Handle additional authors
            $additional_authors = $this->input->post('additional_authors');

            if (!empty($additional_authors)) {
                foreach ($additional_authors as $author_name) {
                    if (strtolower($author_name) != strtolower($user['nama'])) {
                        $author = $this->db->get_where($this->PENULIS_DB, ['nama' => $author_name])->row_array();
                        if ($author) {
                            $data_milik = [
                                "nip_m" => $author['nip_m'],
                                "id_buku" => $id_buku
                            ];
                            $this->db->insert($this->MILIK_DB, $data_milik);
                        }
                    }
                }
            }

            return true;
        } else {
            return false;
        }
    }

    public function countBooksByStatus($status)
    {
        $this->db->select('COUNT(DISTINCT buku.id_buku) as count');
        $this->db->from('milik');
        $this->db->join('buku', 'milik.id_buku = buku.id_buku');
        $this->db->where('milik.status', $status);
        $query = $this->db->get();
        return $query->row()->count;
    }

    public function countBooksByStatusForPenulis($status, $nip_m)
    {
        $this->db->select('COUNT(DISTINCT buku.id_buku) as count');
        $this->db->from('milik');
        $this->db->join('buku', 'milik.id_buku = buku.id_buku');
        $this->db->where('milik.status', $status);
        $this->db->where('milik.nip_m', $nip_m);
        $query = $this->db->get();
        return $query->row()->count;
    }

    public function getAllBukuIsbn()
    {
        return $this->db->query("
        SELECT 
            c.id_buku, 
            GROUP_CONCAT(DISTINCT b.nip_m ORDER BY b.nip_m ASC SEPARATOR ', ') as nip_m,
            GROUP_CONCAT(DISTINCT b.nama ORDER BY b.nama ASC SEPARATOR ', ') as pengarang, 
            c.judul, 
            c.halaman, 
            c.media,
            c.sinopsis,
            a.status,
            c.no_isbn,
            c.tanggal_terbit,
            c.penerbit,
            c.editor,
            c.kdt
        FROM $this->MILIK_DB a
        JOIN $this->PENULIS_DB b ON a.nip_m = b.nip_m
        JOIN $this->BUKU_DB c ON a.id_buku = c.id_buku
        GROUP BY c.id_buku
        ORDER BY c.id_buku DESC
    ")->result_array();
    }
}
