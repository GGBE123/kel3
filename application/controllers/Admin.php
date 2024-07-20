<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        // Memeriksa apakah pengguna telah login dengan memeriksa session 'email'
        if (!$this->session->userdata('email')) {
            // Jika tidak ada session 'email', set flashdata dan redirect ke halaman adminLogin
            $this->session->set_flashdata('login_message', '<div class="alert alert-danger text=center" role="alert">Silahkan Login Ulang</div>');
            redirect('adminLogin');
        } else {
            // Jika session 'email' ada, load model Admin_model sebagai 'am' dan Buku_model secara umum
            $this->load->model('Admin_model', 'am');
            $this->load->model('Buku_model'); // Load the model
        }
    }

    // Halaman utama admin
    public function index()
    {
        // Mengatur data yang akan dikirimkan ke view
        $data = [
            'dashboard' => 'active', // Menandakan menu dashboard aktif di sidebar
            'title' => 'admin-dashboard', // Judul halaman
            'user' => $this->am->get_user_data($this->session->userdata('email')), // Data pengguna yang sedang login
            // Menghitung jumlah buku berdasarkan status tertentu
            'countProses' => $this->Buku_model->countBooksByStatus('not reviewed'), // Buku dalam proses peninjauan
            'countReview' => $this->Buku_model->countBooksByStatus('being reviewed'), // Buku sedang direview
            'countDiajukanIsbn' => $this->Buku_model->countBooksByStatus('Sedang diajukan ke ISBN'), // Buku sedang diajukan ke ISBN
            'countDiterima' => $this->Buku_model->countBooksByStatus('accepted'), // Buku diterima
            'countDitolak' => $this->Buku_model->countBooksByStatus('denied') // Buku ditolak
        ];

        // Memuat view dengan data yang telah disiapkan
        $this->load->view('AdminTemplate/navbar', $data); // Memuat navbar admin
        $this->load->view('Admin/index', $data); // Memuat halaman dashboard admin
        $this->load->view('AdminTemplate/sidebar'); // Memuat sidebar admin
    }

    // Halaman untuk mengelola data staff
    public function data_staff()
    {
        // Mengambil data pengguna yang sedang login
        $user = $this->am->get_user_data($this->session->userdata('email'));

        // Memeriksa apakah pengguna memiliki akses sebagai admin
        if ($user['role'] == 'admin') {
            // Data yang akan dikirimkan ke view
            $data = [
                'data_staff' => 'active', // Menandakan menu data staff aktif di sidebar
                'title' => 'Staff-Dashboard', // Judul halaman
                'user' => $this->am->get_user_data($this->session->userdata('email')), // Data pengguna yang sedang login
                'staff' => $this->am->get_staff() // Data semua staff dari database
            ];

            // Memuat view dengan data yang telah disiapkan
            $this->load->view('AdminTemplate/navbar', $data); // Memuat navbar admin
            $this->load->view('Admin/master_data/data_staff', $data); // Memuat halaman data staff
            $this->load->view('AdminTemplate/sidebar'); // Memuat sidebar admin
        } else {
            // Jika pengguna bukan admin, set flashdata dan redirect ke halaman adminLogin
            $this->session->set_flashdata('login_message', '<div class="alert alert-danger text=center" role="alert">Akses ditolak, silahkan login kembali</div>');
            $this->session->unset_userdata('email');
            redirect('adminLogin');
        }
    }

    // Halaman untuk mengelola data penulis
    public function data_penulis()
    {
        // Mengambil data pengguna yang sedang login
        $user = $this->am->get_user_data($this->session->userdata('email'));

        // Memeriksa apakah pengguna memiliki akses sebagai admin
        if ($user['role'] == 'admin') {
            // Memuat model Penulis_model untuk mengelola data penulis
            $this->load->model('Penulis_model');

            // Data yang akan dikirimkan ke view
            $data = [
                'data_penulis' => 'active', // Menandakan menu data penulis aktif di sidebar
                'title' => 'Penulis-Dashboard', // Judul halaman
                'user' => $this->am->get_user_data($this->session->userdata('email')), // Data pengguna yang sedang login
                'penulis' => $this->Penulis_model->get_penulis() // Data semua penulis dari database
            ];

            // Memuat view dengan data yang telah disiapkan
            $this->load->view('AdminTemplate/navbar', $data); // Memuat navbar admin
            $this->load->view('Admin/master_data/data_penulis', $data); // Memuat halaman data penulis
            $this->load->view('AdminTemplate/sidebar'); // Memuat sidebar admin
        } else {
            // Jika pengguna bukan admin, set flashdata dan redirect ke halaman adminLogin
            $this->session->set_flashdata('login_message', '<div class="alert alert-danger text=center" role="alert">Akses ditolak, silahkan login kembali</div>');
            $this->session->unset_userdata('email');
            redirect('adminLogin');
        }
    }

    // Halaman untuk mengelola data buku
    public function data_buku()
    {
        // Mengambil data pengguna yang sedang login
        $user = $this->am->get_user_data($this->session->userdata('email'));

        // Memeriksa apakah pengguna memiliki akses sebagai staff perpustakaan
        if ($user['role'] == 'staff perpustakaan') {
            // Data yang akan dikirimkan ke view
            $data = [
                'data_buku' => 'active', // Menandakan menu data buku aktif di sidebar
                'title' => 'Buku-Dashboard', // Judul halaman
                'user' => $this->am->get_user_data($this->session->userdata('email')) // Data pengguna yang sedang login
            ];

            // Memuat view dengan data yang telah disiapkan
            $this->load->view('AdminTemplate/navbar', $data); // Memuat navbar admin
            $this->load->view('Admin/data/data_buku'); // Memuat halaman data buku
            $this->load->view('AdminTemplate/sidebar'); // Memuat sidebar admin
        } else {
            // Jika pengguna bukan staff perpustakaan, set flashdata dan redirect ke halaman adminLogin
            $this->session->set_flashdata('login_message', '<div class="alert alert-danger text=center" role="alert">Akses ditolak, silahkan login kembali</div>');
            $this->session->unset_userdata('email');
            redirect('adminLogin');
        }
    }

    // Halaman untuk menampilkan semua pengajuan buku
    public function allSubmissions()
    {
        // Mengambil semua pengajuan buku dari Buku_model
        $data['all_submissions'] = $this->Buku_model->getAllSubmissions(); // Mengambil semua pengajuan buku
        $data['data_buku'] = $data['all_submissions']; // Menugaskan semua pengajuan buku ke data_buku
        $data['user'] = $this->am->get_user_data($this->session->userdata('email')); // Mengambil data pengguna yang sedang login

        // Memuat view dengan data yang telah disiapkan
        $this->load->view('AdminTemplate/navbar', $data); // Memuat navbar admin
        $this->load->view('Admin/data/all_submissions', $data); // Memuat halaman semua pengajuan buku
        $this->load->view('AdminTemplate/sidebar'); // Memuat sidebar admin
    }

    // Metode untuk mengubah status buku
    public function updateStatus()
    {
        // Memuat model Buku_model
        $this->load->model('Buku_model');

        // Mengambil data dari input
        $id_buku = $this->input->post('id_buku', true);
        $status = $this->input->post('status', true);

        // Memeriksa apakah id_buku dan status tidak kosong
        if (empty($id_buku) || empty($status)) {
            echo json_encode(['response' => 400, 'message' => 'ID Buku dan Status harus diisi']);
            return;
        }

        // Data untuk diupdate
        $data = [
            'status' => $status
        ];

        // Memperbarui status buku berdasarkan id_buku
        $this->db->where('id_buku', $id_buku);
        $update = $this->db->update('milik', $data);

        if ($update) {
            // Jika update berhasil, arahkan kembali ke halaman allSubmissions
            $dataStatus = $this->Buku_model->getAllBuku();
            echo json_encode(['response' => 201, 'dataStatus' => $dataStatus]);
            $this->session->set_flashdata('penulis_message', '<script>Swal.fire({title: "Success!",text: "Your data is submitted!",icon: "success"});</script>');
            redirect('Admin/allSubmissions');
        } else {
            // Jika update gagal, berikan respons error
            echo json_encode(['response' => 500, 'message' => 'Update status buku gagal']);
        }
    }

    // Halaman untuk menampilkan data buku berdasarkan status ISBN
    public function dataBukuIsbn()
    {
        // Memuat model Buku_model
        $this->load->model('Buku_model');
        $allBooks = $this->Buku_model->getAllSubmissions(); // Mengambil semua pengajuan buku

        // Mengelompokkan buku berdasarkan status ISBN
        $dataIsbn = [
            'not reviewed' => [],
            'being reviewed' => [],
            'accepted' => [],
            'denied' => []
        ];

        foreach ($allBooks as $book) {
            $dataIsbn[$book['status']][] = $book;
        }

        // Data yang akan dikirimkan ke view
        $data['dataIsbn'] = $dataIsbn;
        $data['user'] = $this->am->get_user_data($this->session->userdata('email')); // Data pengguna yang sedang login

        // Memuat view dengan data yang telah disiapkan
        $this->load->view('AdminTemplate/navbar', $data); // Memuat navbar admin
        $this->load->view('Admin/data/dataBukuIsbn', $data); // Memuat halaman data buku berdasarkan status ISBN
        $this->load->view('AdminTemplate/sidebar'); // Memuat sidebar admin
    }

    // Halaman untuk menampilkan daftar staff
    public function staff_menu()
    {
        // Mengambil data pengguna yang sedang login
        $user = $this->am->get_user_data($this->session->userdata('email'));
        $staff = $this->am->get_staff(); // Mengambil data semua staff

        // Data yang akan dikirimkan ke view
        $data = [
            'title' => 'Daftar Staff', // Judul halaman
            'staff_menu' => 'active', // Menandakan menu daftar staff aktif di sidebar
            'user' => $user, // Data pengguna yang sedang login
            'staff' => $staff // Data semua staff
        ];

        // Memuat view dengan data yang telah disiapkan
        $this->load->view('AdminTemplate/navbar', $data); // Memuat navbar admin
        $this->load->view('Admin/master_data/data_staff', $data); // Memuat halaman daftar staff
        $this->load->view('AdminTemplate/sidebar', $data); // Memuat sidebar admin
    }

    // Metode untuk menambahkan staff baru
    public function add_staff()
    {
        // Data staff baru yang akan dimasukkan ke database
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role' => $this->input->post('role')
        ];

        // Memanggil model Admin_model untuk memasukkan data staff baru
        $this->am->insert_staff($data);
        $this->session->set_flashdata('staff_message', '<div class="alert alert-success" role="alert">Staff added successfully!</div>');
        redirect('admin/staff_menu'); // Redirect ke halaman daftar staff
    }

    // Metode untuk menghapus staff berdasarkan ID
    public function delete_staff($id)
    {
        // Memanggil model Admin_model untuk menghapus staff berdasarkan ID
        $this->am->delete_staff($id);
        $this->session->set_flashdata('staff_message', '<div class="alert alert-success" role="alert">Staff deleted successfully!</div>');
        redirect('admin/staff_menu'); // Redirect ke halaman daftar staff
    }
}
