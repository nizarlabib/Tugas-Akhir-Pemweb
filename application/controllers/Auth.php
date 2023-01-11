<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{
		if ($this->session->userdata('id')) {
			redirect('dashboard');
		} else {
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|trim');
			if ($this->form_validation->run() == false) {
				$this->load->view('auth/login');
			} else {
				$this->login();
			}
		}
	}

	private function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'id' => $user['id'],
						'email' => $user['email'],
						'name' => $user['name'],
						'noHp' => $user['noHp'],
						'is_active' => $user['is_active'],
						'role' => $user['role']
					];
					$this->session->set_userdata($data);
					if ($this->session->userdata()) {
						redirect('dashboard');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> 
					Wrong password!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> 
					Account is not active!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> 
					Email not register!</div>');
			redirect('auth');
		}
	}

	public function register()
	{
		if ($this->session->userdata('id')) {
			redirect('dashboard');
		} else {
			$this->form_validation->set_rules('name', 'Name', 'required|trim');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
				'is_unique' => 'This email already use'
			]);
			$this->form_validation->set_rules('nohp', 'NoHP', 'required|trim|is_unique[user.email]', [
				'is_unique' => 'This number already use'
			]);
			$this->form_validation->set_rules('password', 'Password', 'required|trim');
			if ($this->form_validation->run() == false) {
				$this->load->view('auth/register');
			} else {
				$this->load->model('Model_user');
				$this->Model_user->setUser();
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
			Berhasil register, silahkan login!</div>');
				redirect('auth');
			}
		}
	}

	public function logout()
	{
		$id = $this->session->userdata('id');
		$user = $this->db->get_where('user', ['id' => $id])->row_array();
		$array_items = array('id' => $user['id'], 'email' => $user['email'], 'name' => $user['name'], 'noHp' => $user['noHp']);

		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();
		redirect('auth');
	}
}
