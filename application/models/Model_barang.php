<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_barang extends CI_Model
{
    public function setBarang()
    {
        $barang = [
            'namaBarang' => $this->input->post('nama'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'idSupplier' => $this->input->post('idSupplier')
        ];
        $this->db->insert('barang', $barang);
    }

    public function getBarang()
    {
        return $this->db->query('SELECT b.idBarang, b.namaBarang, b.harga, b.stok, s.idSupplier, s.namaSupplier FROM barang b JOIN supplier s on b.idSupplier = s.idSupplier;')->result_array();
    }

    public function getBarangbyid($id)
    {
        return $this->db->query("SELECT b.idBarang, b.namaBarang, b.harga, b.stok, s.idSupplier, s.namaSupplier FROM barang b JOIN supplier s ON b.idSupplier = s.idSupplier AND b.idBarang = '$id';")->row_array();
    }

    public function updateBarang($id)
    {
        $barang = [
            'idBarang' => $this->input->post('idBarang'),
            'namaBarang' => $this->input->post('nama'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'idSupplier' => $this->input->post('idSupplier')
        ];
        $this->db->where('idBarang', $id);
        $this->db->update('barang', $barang);
    }


    public function deleteBarang($id)
    {
        $this->db->where('idBarang', $id);
        $this->db->delete('barang');
    }

    public function hitungBarang()
    {
        return
            $this->db->count_all_results('barang');
    }
}
