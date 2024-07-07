<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
    private $DB_MILIK = 'milik';
    private $DB_BUKU = 'buku';
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
        $this->load->view('penulis/Information/pengajuan');
    }

    public function submit()
    {
        // Get form data


        // Call the model method to insert the data
        $inserted = $this->Buku_model->insertBuku();

        if ($inserted) {
            // Redirect to a success page
            $this->session->set_flashdata('penulis_message', '<script>Swal.fire({title: "Success!",text: "Your data is submitted!",icon: "success"});</script>');
            redirect('Penulis/pengajuan');
        } else {
            // Redirect to an error page
            $this->load->view('formISBN/error');
        }
    }

    public function update()
    {
        $data = [
            'id_buku' => $this->input->post('id_buku', true),
            'pengarang' => $this->input->post('pengarang', true),
            'judul' => $this->input->post('judul', true),
            'halaman' => $this->input->post('halaman', true),
            'media' => $this->input->post('media', true),
            'sinopsis' => $this->input->post('sinopsis', true)

        ];

        $this->db->where('id_buku', $data['id_buku']);
        $update = $this->db->update('buku', $data);

        if ($update) {
            $dataBuku = $this->Buku_model->getAllBuku();
            echo json_encode(['response' => 201, 'dataBuku' => $dataBuku]);
        }
    }
    public function deleteData($id_milik)
    {
        $data_milik = $this->db->get_where($this->DB_MILIK, ['id_milik' => $id_milik])->row_array();
        if ($data_milik) {
            $onDeleteBuku = $this->db->where('id_buku', $data_milik['id_buku'])->delete($this->DB_BUKU);
            if ($onDeleteBuku)
            {
                $onDeleteMilik = $this->db->where('id_milik', $data_milik['id_milik'])->delete($this->DB_MILIK);
                if ($onDeleteMilik)
                { 
                    $this->session->set_flashdata('penulis_message', '<script>Swal.fire({title: "Success!",text: "Data Deleted!",icon: "success"});</script>');
                    redirect('Penulis/pengajuan');  
                }
            }
        }
    }
}
