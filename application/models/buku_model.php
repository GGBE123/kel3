<?php
    class Buku_model extends CI_Model{

        private $db;

        public function __construct()
        {
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'isbn';

            $this->db = new mysqli($host,$username,$password,$dbname);

            if ($this->db->connect_error) {
                die('Koneksi ke database gagal' . $this->db->connect_error);
            }
        }

        
        public function getAllBuku(){
            // getAllBuku
        }
        public function insertBuku(){
            //nambahin buku
        }

        public function updateBuku(){
            // nambahin Buku
        }

    }
?>