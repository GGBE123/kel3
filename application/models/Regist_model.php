<?php
class Regist_model extends CI_Model {
    private $db;

    public function __construct(){
        parent::__construct();
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'isbn';

        // Membuat koneksi ke database MySQL
        $this->db = new mysqli($host, $username, $password, $dbname);

        // Memeriksa apakah koneksi berhasil
        if ($this->db->connect_error) {
            die('Koneksi ke database gagal' . $this->db->connect_error);
        }
    }

    // Metode untuk mendaftarkan pengguna baru
    public function register_user($data) {
        // Validasi data pendaftaran sebelum menyimpan ke database
        if ($this->validateRegistrationData($data)) {
            // Meng-hash password sebelum menyimpannya ke database
            $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);

            // Query untuk memasukkan data pengguna baru ke tabel 'penulis'
            $query = "INSERT INTO penulis (nip_m, nama, email, password, role) VALUES (?, ?, ?, ?, ?)";

            // Persiapan statement SQL untuk dieksekusi
            $stmt = $this->db->prepare($query);

            // Binding parameter ke statement SQL untuk menghindari SQL injection
            $stmt->bind_param('sssss', $data['NIP'], $data['nama'], $data['email'], $hashed_password, $data['role']);

            // Mengeksekusi statement SQL
            if ($stmt->execute()) {
                return true; // Mengembalikan true jika pendaftaran berhasil
            } else {
                return false; // Mengembalikan false jika terjadi kesalahan saat eksekusi
            }
        }
    }

    // Metode untuk validasi data pendaftaran
    private function validateRegistrationData($data) {
        // Memeriksa apakah semua field yang diperlukan diisi
        if (empty($data['NIP']) || empty($data['nama']) || empty($data['email']) || empty($data['password']) || empty($data['role'])) {
            return false; // Mengembalikan false jika ada field yang kosong
        }

        // Memeriksa format email yang valid menggunakan fungsi filter_var()
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return false; // Mengembalikan false jika format email tidak valid
        }

        // Memeriksa panjang password minimal 8 karakter
        if (strlen($data['password']) < 8) {
            return false; // Mengembalikan false jika password kurang dari 8 karakter
        }

        return true; // Mengembalikan true jika semua validasi berhasil
    }

    // Metode untuk menutup koneksi ke database
    public function closeConnection() {
        $this->db->close(); // Menutup koneksi ke database
    }
}
?>
