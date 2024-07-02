<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penulis extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		if (!$this->session->userdata('email')) {
			$this->session->set_flashdata('login_message', '<div class="alert alert-danger text=center" role="alert">Silahkan Login Ulang</div>');
			redirect('PenulisLogin');
		} else {
			$this->load->model('Penulis_model', 'pm');
		}
	}

	public function index()
	{
		$data = [
			'dashboard' => 'active',
			'title' => 'Penulis-dashboard',
			'user' => $this->pm->get_user_data($this->session->userdata('email'))
		];

		$this->load->view('AdminTemplate/navbar', $data);
		$this->load->view('Penulis/index');
		$this->load->view('AdminTemplate/sidebar');
	}
	public function data_staff()
	{
		$user = $this->pm->get_user_data($this->session->userdata('email'));

		if ($user['role'] == 'admin') {

			$data = [
				'data_staff' => 'active',
				'title' => 'Staff-Dashboard',
				'user' => $this->pm->get_user_data($this->session->userdata('email'))
			];

			$this->load->view('AdminTemplate/navbar', $data);
			$this->load->view('Admin/master_data/data_staff');
			$this->load->view('AdminTemplate/sidebar');
		} else {

			$this->session->set_flashdata('login_message', '<div class="alert alert-danger text=center" role="alert">Akses ditolak, silahkan login kembali</div>');
			$this->session->unset_userdata('email');
			redirect('PenulisLogin');
		}
	}
	public function data_penulis()
	{
		$user = $this->pm->get_user_data($this->session->userdata('email'));

		if ($user['role'] == 'admin') {
			$data = [
				'data_penulis' => 'active',
				'title' => 'Penulis-Dashboard',
				'user' => $this->pm->get_user_data($this->session->userdata('email'))
			];

			$this->load->view('AdminTemplate/navbar', $data);
			$this->load->view('Admin/master_data/data_penulis');
			$this->load->view('AdminTemplate/sidebar');
		} else {

			$this->session->set_flashdata('login_message', '<div class="alert alert-danger text=center" role="alert">Akses ditolak, silahkan login kembali</div>');
			$this->session->unset_userdata('email');
			redirect('PenulisLogin');
		}
	}
}