<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('artikel_model');
		$this->load->model('user_model');
	}

	public function index()
	{
		$data['artikels'] = $this->artikel_model->get_artikel();

		$this->load->view('layouts/header');
		$this->load->view('artikel/artikel',$data);
		$this->load->view('layouts/footer');

	}

	public function view($slug = null)
	{
		$data['artikel_item'] = $this->artikel_model->get_artikel($slug);
		
		$this->load->view('layouts/header');
		$this->load->view('artikel/view', $data); 
		$this->load->view('layouts/footer');

	}

	public function tambah(){
		if (!$this->user_model->isLoggin()) {
			redirect('');
		}
		$this->form_validation->set_rules('judul','judul','required');
		$this->form_validation->set_rules('konten','Konten','required');

		if ($this->form_validation->run() == false) {
			$this->load->view('layouts/header');
			$this->load->view('artikel/tambah');
			$this->load->view('layouts/footer');
		}else{
			$this->artikel_model->add_news();
			redirect('');
		}

	}

	public function hapus($id)
	{
		$this->artikel_model->delete($id);
		redirect('');
	}
	public function edit($id)
	{
		if (!$this->user_model->isLoggin()) {
			redirect('');
		}
		$this->form_validation->set_rules('judul', 'Judul', 'trim[news.judul]|required');
		$this->form_validation->set_rules('konten', 'konten', 'trim[news.judul]|required');

		if ($this->form_validation->run() == false) {
			$data['artikel_item'] = $this->artikel_model->get_new_id($id);
			$this->load->view('layouts/header');
			$this->load->view('artikel/edit', $data);
			$this->load->view('layouts/footer');

		}else{
			$this->artikel_model->update($id);
			redirect('');
		}
	}

	
}
