<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{
    public function setUser()
    {
        $user = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'noHp' => $this->input->post('nohp'),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role' => 2,
            'is_active' => 1,
            'date_created' => time()
        ];
        $this->db->insert('user', $user);
    }

    public function getUser()
    {
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function getUserbyid($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function updateUser($id)
    {
        $user = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'noHp' => $this->input->post('nohp')
        ];
        $this->db->where('id', $id);
        $this->db->update('user', $user);
    }
    public function activeUser($id, $active)
    {
        $user = [
            'is_active' => $active
        ];
        $this->db->where('id', $id);
        $this->db->update('user', $user);
    }
    public function hitungUser()
    {
        return $this->db->count_all_results('user');
    }
}
