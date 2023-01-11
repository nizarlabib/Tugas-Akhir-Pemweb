<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_supplier extends CI_Model
{
    public function setSupplier()
    {
        $supplier = [
            'namaSupplier' => $this->input->post('nama'),
            'noHp' => $this->input->post('nohp'),
            'alamat' => $this->input->post('alamat')
        ];
        $this->db->insert('supplier', $supplier);
    }

    public function getSupplier()
    {
        $query = $this->db->get('supplier');
        return $query->result_array();
    }

    public function getSupplierbyid($id)
    {
        return $this->db->get_where('supplier', ['idSupplier' => $id])->row_array();
    }

    public function updateSupplier($id)
    {
        $supplier = [
            'namaSupplier' => $this->input->post('nama'),
            'noHp' => $this->input->post('nohp'),
            'alamat' => $this->input->post('alamat')
        ];
        $this->db->where('idSupplier', $id);
        $this->db->update('supplier', $supplier);
    }

    public function deleteSupplier($id)
    {
        $this->db->where('idSupplier', $id);
        $this->db->delete('supplier');
    }

    public function hitungSupplier()
    {
        return
            $this->db->count_all_results('supplier');
    }
}
