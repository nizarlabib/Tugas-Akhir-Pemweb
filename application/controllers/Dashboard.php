<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id'))) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->model('Model_barang');
        $this->load->model('Model_supplier');
        $this->load->model('Model_user');
        $this->load->model('Model_transaksi');
    }

    public function index()
    {
        $data['jmluser'] = $this->Model_user->hitungUser();
        $data['jmlsupplier'] = $this->Model_supplier->hitungSupplier();
        $data['jmlbarang'] = $this->Model_barang->hitungBarang();
        $data['jmltransaksi'] = $this->Model_transaksi->hitungTransaksi();
        $id = $this->session->userdata('id');
        $data['user'] = $this->Model_user->getUserbyid($id);
        $this->load->view('dashboard/dashboard', $data);
    }

    public function barang()
    {
        $data['barang'] = $this->Model_barang->getBarang();
        $this->load->view('dashboard/barang', $data);
    }

    public function supplier()
    {
        $data['supplier'] = $this->Model_supplier->getSupplier();
        $this->load->view('dashboard/supplier', $data);
    }

    public function addbarang()
    {
        $data['supplier'] = $this->Model_supplier->getSupplier();
        $this->load->view('dashboard/addbarang', $data);
        if (isset($_POST['kirim'])) {
            $this->Model_barang->setBarang();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
					Berhasil tambah data barang!</div>');
            redirect('dashboard/barang', 'refresh');
        }
    }

    public function profile()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->Model_user->getUserbyid($id);
        $this->load->view('dashboard/profile', $data);
    }

    public function detailbarang($id)
    {
        $data['barang'] = $this->Model_barang->getBarangbyid($id);
        $this->load->view('dashboard/detailbarang', $data);
    }
    public function editbarang($id)
    {
        $data['supplier'] = $this->Model_supplier->getSupplier();
        $data['barang'] = $this->Model_barang->getBarangbyid($id);

        $this->load->view('dashboard/editbarang', $data);
    }

    public function updatebarang()
    {
        $idBarang
            = $this->input->post('idBarang');
        $this->Model_barang->updateBarang($idBarang);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
					Berhasil edit data barang!</div>');
        redirect('dashboard/barang', 'refresh');
    }


    public function deletebarang($id)
    {
        $this->Model_barang->deleteBarang($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
					Berhasil hapus data barang!</div>');
        redirect('dashboard/barang', 'refresh');
    }

    public function addsupplier()
    {

        $this->load->view('dashboard/addsupplier');
        if (isset($_POST['kirim'])) {

            $this->Model_supplier->setSupplier();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
					Berhasil tambah data supplier!</div>');
            redirect('dashboard/supplier', 'refresh');
        }
    }

    public function detailsupplier($id)
    {
        $data['supplier'] = $this->Model_supplier->getSupplierbyid($id);
        $this->load->view('dashboard/detailsupplier', $data);
    }
    public function editsupplier($id)
    {
        $data['supplier'] = $this->Model_supplier->getSupplierbyid($id);
        $this->load->view('dashboard/editsupplier', $data);
    }
    public function updatesupplier()
    {
        $idSupplier = $this->input->post('idSupplier');
        $this->Model_supplier->updateSupplier($idSupplier);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
					Berhasil edit data supplier!</div>');
        redirect('dashboard/supplier', 'refresh');
    }

    public function deletesupplier($id)
    {
        $this->Model_supplier->deleteSupplier($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
					Berhasil hapus data supplier!</div>');
        redirect('dashboard/supplier', 'refresh');
    }


    public function updateprofile()
    {
        $idUser = $this->session->userdata('id');
        $data['user'] = $this->Model_user->getUserbyid($idUser);
        $this->load->view('dashboard/editprofile', $data);
        $id = $this->input->post('id');
        $this->Model_user->updateUser($id);
        if ($this->input->post('id')) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
					Berhasil edit profil!</div>');
            redirect('dashboard/profile', 'refresh');
        }
    }

    public function transaksi()
    {
        $data['transaksi'] = $this->Model_transaksi->getTransaksi();
        $this->load->view('dashboard/transaksi', $data);
    }

    public function addtransaksi()
    {

        $data['barang'] = $this->Model_barang->getBarang();
        $this->load->view('dashboard/addtransaksi', $data);
        if (isset($_POST['kirim'])) {
            $total = $this->Model_barang->getBarangbyid($this->input->post('idBarang'));
            $totalHarga = $total['harga'];
            $this->Model_transaksi->setTransaksi($totalHarga);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
					Berhasil tambah data transaksi!</div>');
            redirect('dashboard/transaksi', 'refresh');
        }
    }

    public function detailtransaksi($id)
    {
        $data['transaksi'] = $this->Model_transaksi->getTransaksibyid($id);
        $this->load->view('dashboard/detailtransaksi', $data);
    }

    public function user()
    {
        $data['user'] = $this->Model_user->getUser();
        $this->load->view('dashboard/user', $data);
    }
    public function edituser($id)
    {
        $data['user'] = $this->Model_user->getUserbyid($id);
        $this->load->view('dashboard/edituser', $data);
    }
    public function updateuser()
    {
        $id = $this->input->post('id');
        $active = $this->input->post('active');
        $this->Model_user->activeUser($id, $active);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
					Berhasil edit user!</div>');
        redirect('dashboard/user', 'refresh');
    }
}
