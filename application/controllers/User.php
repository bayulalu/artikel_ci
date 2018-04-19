<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
	}

	public function register(){
		$this->form_validation->set_rules('user','User','required');
		$this->form_validation->set_rules('email','Email','required|is_unique[user.email]');
		$this->form_validation->set_rules('password','password','required|min_length[6]');
		$this->form_validation->set_rules('password2','password2','required|matches[password]');
		if ($this->form_validation->run() === false) {
			$this->load->view('auth/register');
		}else{
			$this->user_model->insert();
			redirect('login');

		}
	}

	public function login()
	{
		if ($this->user_model->isLoggin()) {
			redirect('admin');
		}

		$this->form_validation->set_rules('email','Email','required|callback_cekEmail');
		$this->form_validation->set_rules('password','Password','required|callback_cekPassword');
		
		if ($this->form_validation->run() === false) {
			$this->load->view('auth/login');
		}else{
			$user = $this->user_model->get_user('email',$this->input->post('email'));

			$_SESSION['user_id'] = $user['id'];
			// $_SESSION['logged_in'] = true;
			$_SESSION['loggin'] = true;

			redirect('');
		}
	}

	public function cekEmail($email)
	{
		if (!$this->user_model->get_user('email', $email)) {
			$this->form_validation->set_message('cekEmail', 'Email Belum Terdaftar ');
			return false;
		}

		return true;
	}

	public function cekPassword($password)
	{
		$user = $this->user_model->get_user('email', $this->input->post('email'));
		if (!$this->user_model->cekPassword($user['email'], $password )) {
			$this->form_validation->set_message('cekPassword','Password yang adna masukan salah');
			return false;
		}
		return true;
	}

	public function logout()
	{
		session_destroy();
		redirect('');
	}


}



