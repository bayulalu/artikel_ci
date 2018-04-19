<?php 

/**
* 
*/
class User_Model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function insert()
	{
		$this->load->helper('string');
		$_SESSION['token'] = random_string('alnum',16);

		$data = array(
			'user' => $this->input->post('user'),
			'email' => $this->input->post('email'),
			'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
			'token' => $_SESSION['token']
		);

		$this->db->insert('user', $data);
	}

	public function get_user($key, $value)
	{
		$query = $this->db->get_where('user' ,array($key=>$value));
		if (!empty($query->row_array())) {
			return $query->row_array();
		}

		return false;
	}


	public function isLoggin(){
		if (!isset($_SESSION['loggin'])) {
			return false;
		}
		return true;
	}

	public function cekPassword($email, $password)
	{
		$hash = $this->get_user('email',$email)['password'];

		if (password_verify($password,$hash)) {
			return true;
		}

		return false;
	}

	
}