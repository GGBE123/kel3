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
		}
	}

	public function index()
	{
		$data = [
			'dashboard' => 'active',
			'title' => 'admin-dashboard',
			'user' => $this->am->get_user_data($this->session->userdata('email'))
		];

		$this->load->view('AdminTemplate/navbar', $data);
		$this->load->view('Admin/index');
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

		if ($user['role'] == 'staff') {
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
		$this->load->model('Buku_model'); // Load the model
		$data['all_submissions'] = $this->Buku_model->getAllSubmissions(); // Fetch all submissions
		$data['user'] = $this->am->get_user_data($this->session->userdata('email')); // Tambahkan ini
		$this->load->view('AdminTemplate/navbar', $data);
		$this->load->view('Admin/data/all_submissions', $data);
		$this->load->view('AdminTemplate/sidebar');
	}
}
