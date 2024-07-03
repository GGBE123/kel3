<?php
defined('BASEPATH') or exit('No direct script access allowed');
// bebasas 
class Penulis extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		if (!$this->session->userdata('email')) {
			$this->session->set_flashdata('login_message', '<div class="alert alert-danger text=center" role="alert">Silahkan Login Ulang</div>');
			redirect('PenulisLogin');
		} else {
			$this->load->model('penulis_model', 'pm');
		}
	}

	public function index()
	{
		$data = [
			'dashboard' => 'active',
			'title' => 'penulis-dashboard',
			'user' => $this->pm->get_user_data($this->session->userdata('email'))
		];

		$this->load->view('UserTemplate/navbar', $data);
		$this->load->view('Penulis/index');
		$this->load->view('UserTemplate/sidebar');
	}
	public function pengajuan()
	{
		$user = $this->pm->get_user_data($this->session->userdata('email'));

		if ($user['role'] == 'Dosen' || $user['role'] == 'Mahasiswa'|| $user['role'] == 'Staff') {

			$data = [
				'data_staff' => 'active',
				'title' => 'Penulis-Dashboard',
				'user' => $this->pm->get_user_data($this->session->userdata('email'))
			];

			$this->load->view('UserTemplate/navbar', $data);
			$this->load->view('Penulis/Information/pengajuan');
			$this->load->view('UserTemplate/sidebar');
		} else {

			$this->session->set_flashdata('login_message', '<div class="alert alert-danger text=center" role="alert">Akses ditolak, silahkan login kembali</div>');
			$this->session->unset_userdata('email');
			redirect('PenulisLogin');
		}
	}
	public function status()
	{
		$user = $this->pm->get_user_data($this->session->userdata('email'));

		if ($user['role'] == 'Dosen' || $user['role'] == 'Mahasiswa'|| $user['role'] == 'Staff') {
			$data = [
				'data_penulis' => 'active',
				'title' => 'Penulis-Dashboard',
				'user' => $this->pm->get_user_data($this->session->userdata('email'))
			];

			$this->load->view('UserTemplate/navbar', $data);
			$this->load->view('Penulis/Information/status');
			$this->load->view('UserTemplate/sidebar');
		} else {

			$this->session->set_flashdata('login_message', '<div class="alert alert-danger text=center" role="alert">Akses ditolak, silahkan login kembali</div>');
			$this->session->unset_userdata('email');
			redirect('PenulisLogin');
		}
	}
	
}
