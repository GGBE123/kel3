<?php
class buku_model extends CI_Model {

    private $db;

    public function __construct() {
        parent::__construct();
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'isbn';

        $this->db = new mysqli($host, $username, $password, $dbname);

        if ($this->db->connect_error) {
            die('Koneksi ke database gagal' . $this->db->connect_error);
        }
    }

    public function getAllBuku() {
        $query = "SELECT * FROM buku";
        $result = $this->db->query($query);

        if ($result->num_rows > 0) {
            $books = [];
            while ($row = $result->fetch_assoc()) {
                $books[] = $row;
            }
            return $books;
        } else {
            return [];
        }
    }

    public function insertBuku($data) {
        $this->db->begin_transaction();
    
        try {
            $query = "INSERT INTO buku (pengarang, judul, halaman, media, sinopsis) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
    
            $stmt->bind_param(
                "ssiss", 
                $data['pengarang'],
                $data['judul'], 
                $data['halaman'], 
                $data['media'], 
                $data['sinopsis']
            );
    
            $stmt->execute();
            $book_id = $stmt->insert_id;
    
            $query = "INSERT INTO milik (id_buku, nip_m, status) VALUES (?, ?, 'pending')";
            $stmt = $this->db->prepare($query);
    
            $stmt->bind_param("ii", $book_id, $data['nip_m']);
            $stmt->execute();
    
            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $this->db->rollback();
            return false;
        }
    }    
}
