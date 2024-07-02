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

		$this->load->view('UserTemplate/navbar', $data);
		$this->load->view('Penulis/index');
		$this->load->view('UserTemplate/sidebar');
	}
	public function data_dosen()
	{
		$user = $this->pm->get_user_data($this->session->userdata('email'));

		if ($user['role'] == 'dosen') {

			$data = [
				'data_staff' => 'active',
				'title' => 'Dosen-Dashboard',
				'user' => $this->pm->get_user_data($this->session->userdata('email'))
			];

			$this->load->view('UserTemplate/navbar', $data);
			$this->load->view('Penulis/data/pengajuan');
			$this->load->view('UserTemplate/sidebar');
		} else {

			$this->session->set_flashdata('login_message', '<div class="alert alert-danger text=center" role="alert">Akses ditolak, silahkan login kembali</div>');
			$this->session->unset_userdata('email');
			redirect('PenulisLogin');
		}
	}
	public function data_mahasiswa()
	{
		$user = $this->pm->get_user_data($this->session->userdata('email'));

		if ($user['role'] == 'mahasiswa') {
			$data = [
				'data_penulis' => 'active',
				'title' => 'Mahasiswa-Dashboard',
				'user' => $this->pm->get_user_data($this->session->userdata('email'))
			];

			$this->load->view('UserTemplate/navbar', $data);
			$this->load->view('Penulis/data/pengajuan');
			$this->load->view('UserTemplate/sidebar');
		} else {

			$this->session->set_flashdata('login_message', '<div class="alert alert-danger text=center" role="alert">Akses ditolak, silahkan login kembali</div>');
			$this->session->unset_userdata('email');
			redirect('PenulisLogin');
		}
	}
	public function data_staff()
	{
		$user = $this->pm->get_user_data($this->session->userdata('email'));

		if ($user['role'] == 'staff') {
			$data = [
				'data_penulis' => 'active',
				'title' => 'Staff-Dashboard',
				'user' => $this->pm->get_user_data($this->session->userdata('email'))
			];

			$this->load->view('UserTemplate/navbar', $data);
			$this->load->view('Penulis/data/pengajuan');
			$this->load->view('UserTemplate/sidebar');
		} else {

			$this->session->set_flashdata('login_message', '<div class="alert alert-danger text=center" role="alert">Akses ditolak, silahkan login kembali</div>');
			$this->session->unset_userdata('email');
			redirect('PenulisLogin');
		}
	}
}
