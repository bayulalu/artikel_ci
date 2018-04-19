<?php 

/**
* 
*/
class Artikel_Model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_artikel($slug = false)
	{

		if ($slug  == false) {
			$query = $this->db->get('news');
			return $query->result_array();
		}
			$query = $this->db->get_where('news', array('slug' => $slug ));
			return $query->row_array();	
	}

	public function add_news()
	{
		$judul = $this->input->post('judul');
		$slug = url_title($judul,'dash',FALSE);

		$data = [
			'judul' => $judul,
			'isi' => $this->input->post('konten'),
			'slug' => $slug
		];

		$this->db->insert('news', $data);


	}

	public function delete($id)
	{
		return $this->db->delete('news', array('id'=> $id));	
	}

	public function update($id){
		$judul = $this->input->post('judul');
		$slug = url_title($judul, 'dash',FALSE);

		$data = [
			'judul' => $judul,
			'isi' => $this->input->post('konten'),
			'slug' => $slug
		];
		$this->db->where('id',$id);
		$this->db->update('news',$data);
	}

	public function get_new_id($id)
	{
		$query = $this->db->get_where('news',array('id'=> $id));
		return $query->row_array();
	}
	

}