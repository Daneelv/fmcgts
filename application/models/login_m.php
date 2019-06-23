<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_m extends CI_Model {
	
	public function login(){
		//prep query
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', sha1($this->input->post('password')));
		//run query
		$query = $this->db->get('user');
		
		if($query->num_rows == 1) {
			//match returned now check type of user
			$row = $query->row();
			if($row->type == "manager")
			{
				//set session data for manager
				$data = array(
				'userid' => $row->id,
				'companyid' => $row->company_id,
                'username' => $row->username,
                'role' => $row->type,
                'is_logged_in' => true
                );
				
			}
			elseif($row->type == "trainer")
			{
				//set session data for trainer
				$data = array(
				'userid' => $row->id,
				'companyid' => $row->company_id,
                'username' => $row->username,
                'role' => $row->type,
                'is_logged_in' => true
                );
				
			}
			elseif($row->type == "trainee")
			{
				//set session data for trainee
				$data = array(
				'userid' => $row->id,
				'companyid' => $row->company_id,
                'username' => $row->username,
                'role' => $row->type,
                'is_logged_in' => true
                );
				
			}
			elseif($row->type == "admin")
			{
				//set session data for trainee
				$data = array(
				'userid' => $row->id,
				'companyid' => $row->company_id,
                'username' => $row->username,
                'role' => $row->type,
                'is_logged_in' => true
                );
				
			}
			$this->session->set_userdata($data);
				return true;
		}
		// return false if no user found.
		return false;
	
	}
}
/* End of file login_m.php */
/* Location: ./application/models/login_m.php */
