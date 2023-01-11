<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_transaksi extends CI_Model
{
    public function setTransaksi($total)
    {
        $transaksi = [
            'total' => $total,
            'idUser' => $this->input->post('idUser')
        ];
        $this->db->insert('transaksi', $transaksi);
        $idTransaksi = $this->getTransaksiTerakhir();
        $this->setDetailTransaksi($idTransaksi['idTransaksi']);
    }

    public function setDetailTransaksi($id)
    {
        $detailTransaksi = [
            'idTransaksi' => $id,
            'idBarang' => $this->input->post('idBarang')
        ];
        $this->db->insert('detailtransaksi', $detailTransaksi);
    }

    public function getTransaksi()
    {
        return $this->db->query("SELECT t.idTransaksi, t.tglTransaksi, t.total, b.namaBarang, t.idUser, u.name FROM transaksi t, user u, detailtransaksi d, barang b WHERE t.idUser=u.id AND d.idTransaksi=t.idTransaksi AND b.idBarang=d.idBarang;")->result_array();
    }

    public function getTransaksibyid($id)
    {
        return $this->db->get_where('transaksi', array('idTransaksi' => $id))->row_array();
    }

    public function updateTransaksi($id)
    {
        $transaksi = [
            'idTransaksi' => $this->input->post('idTransaksi'),
            'tglTransaksi' => $this->input->post('tanggal'),
            'total' => $this->input->post('total')
        ];
        $this->db->where('idTransaksi', $id);
        $this->db->update('transaksi', $transaksi);
    }

    public function hitungTransaksi()
    {
        return $this->db->count_all_results('transaksi');
    }

    public function getTransaksiTerakhir()
    {
        return $this->db->query("SELECT idTransaksi FROM transaksi ORDER BY idTransaksi DESC LIMIT 1;")->row_array();
    }
}
