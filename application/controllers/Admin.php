<?php
defined('BASEPATH') or exit('No direct script access allowed');
// bebasas 
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('email')) {
			$this->session->set_flashdata('login_message', '<div class="alert alert-danger text=center" role="alert">Silahkan Login Ulang</div>');
			redirect('adminLogin');
		} else {
			$this->load->model('Admin_model', 'am');
			$this->load->model('Buku_model'); // Load the model
		}
	}

	public function index()
	{
		$data = [
			'dashboard' => 'active',
			'title' => 'admin-dashboard',
			'user' => $this->am->get_user_data($this->session->userdata('email')),
			'countProses' => $this->Buku_model->countBooksByStatus('not reviewed'),
			'countReview' => $this->Buku_model->countBooksByStatus('being reviewed'),
			'countDiajukanIsbn' => $this->Buku_model->countBooksByStatus('Sedang diajukan ke ISBN'),
			'countDiterima' => $this->Buku_model->countBooksByStatus('accepted'),
			'countDitolak' => $this->Buku_model->countBooksByStatus('denied')
		];

		$this->load->view('AdminTemplate/navbar', $data);
		$this->load->view('Admin/index', $data);
		$this->load->view('AdminTemplate/sidebar');
	}

	public function data_staff()
	{
		$user = $this->am->get_user_data($this->session->userdata('email'));

		if ($user['role'] == 'admin') {
			$data = [
				'data_staff' => 'active',
				'title' => 'Staff-Dashboard',
				'user' => $this->am->get_user_data($this->session->userdata('email'))
			];

			$this->load->view('AdminTemplate/navbar', $data);
			$this->load->view('Admin/master_data/data_staff');
			$this->load->view('AdminTemplate/sidebar');
		} else {
			$this->session->set_flashdata('login_message', '<div class="alert alert-danger text=center" role="alert">Akses ditolak, silahkan login kembali</div>');
			$this->session->unset_userdata('email');
			redirect('adminLogin');
		}
	}

	public function data_penulis()
	{
		$user = $this->am->get_user_data($this->session->userdata('email'));

		if ($user['role'] == 'admin') {
			$data = [
				'data_penulis' => 'active',
				'title' => 'Penulis-Dashboard',
				'user' => $this->am->get_user_data($this->session->userdata('email'))
			];

			$this->load->view('AdminTemplate/navbar', $data);
			$this->load->view('Admin/master_data/data_penulis');
			$this->load->view('AdminTemplate/sidebar');
		} else {
			$this->session->set_flashdata('login_message', '<div class="alert alert-danger text=center" role="alert">Akses ditolak, silahkan login kembali</div>');
			$this->session->unset_userdata('email');
			redirect('adminLogin');
		}
	}

	public function data_buku()
	{
		$user = $this->am->get_user_data($this->session->userdata('email'));

		if ($user['role'] == 'staff perpustakaan') {
			$data = [
				'data_buku' => 'active',
				'title' => 'Buku-Dashboard',
				'user' => $this->am->get_user_data($this->session->userdata('email'))
			];

			$this->load->view('AdminTemplate/navbar', $data);
			$this->load->view('Admin/data/data_buku');
			$this->load->view('AdminTemplate/sidebar');
		} else {
			$this->session->set_flashdata('login_message', '<div class="alert alert-danger text=center" role="alert">Akses ditolak, silahkan login kembali</div>');
			$this->session->unset_userdata('email');
			redirect('adminLogin');
		}
	}
	public function allSubmissions()
	{
		$data['all_submissions'] = $this->Buku_model->getAllSubmissions(); // Fetch all submissions
		$data['data_buku'] = $data['all_submissions']; // Assign all submissions to data_buku
		$data['user'] = $this->am->get_user_data($this->session->userdata('email')); // Fetch user data
		$this->load->view('AdminTemplate/navbar', $data);
		$this->load->view('Admin/data/all_submissions', $data);
		$this->load->view('AdminTemplate/sidebar');
	}

	public function updateStatus()
{
    // Load model Buku_model
    $this->load->model('Buku_model');

    // Ambil data dari input
    $id_buku = $this->input->post('id_buku', true);
    $status = $this->input->post('status', true);

    // Periksa apakah id_buku dan status tidak kosong
    if (empty($id_buku) || empty($status)) {
        echo json_encode(['response' => 400, 'message' => 'ID Buku dan Status harus diisi']);
        return;
    }

    // Data untuk diupdate
    $data = [
        'status' => $status
    ];

    // Update status buku berdasarkan id_buku
    $this->db->where('id_buku', $id_buku);
    $update = $this->db->update('milik', $data);

    if ($update) {
        $dataStatus = $this->Buku_model->getAllBuku();
        echo json_encode(['response' => 201, 'dataStatus' => $dataStatus]);
		$this->session->set_flashdata('penulis_message', '<script>Swal.fire({title: "Success!",text: "Your data is submitted!",icon: "success"});</script>');
            redirect('Admin/allSubmissions');
    } else {
        echo json_encode(['response' => 500, 'message' => 'Update status buku gagal']);
    }
}

	public function dataBukuIsbn()
	{
		$this->load->model('Buku_model');
		$data['dataIsbn'] = $this->Buku_model->getAllBukuIsbn();
		$data['user'] = $this->am->get_user_data($this->session->userdata('email')); // Buat Session
		$this->load->view('AdminTemplate/navbar', $data);
		$this->load->view('Admin/data/dataBukuIsbn');
		$this->load->view('AdminTemplate/sidebar',);
	}
}
