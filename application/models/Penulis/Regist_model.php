<?php
class Regist_model extends CI_Model {
    private $db;

    public function __construct(){
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

    public function register_user($data) {
        if ($this->validateRegistrationData($data)) {
            $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);

            $query = "INSERT INTO penulis (nip_m, nama, email, password, role) VALUES (?, ?, ?, ?, ?)";

            $stmt = $this->db->prepare($query);

            $stmt->bind_param('sssss', $data['NIP'], $data['nama'], $data['email'], $hashed_password, $data['role']);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }

    private function validateRegistrationData($data) {
        if (empty($data['NIP']) || empty($data['nama']) || empty($data['email']) || empty($data['password']) || empty($data['role'])) {
            return false;
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        if (strlen($data['password']) < 8) {
            return false;
        }

        return true;
    }

    public function closeConnection() {
        $this->db->close();
    }
}
?>