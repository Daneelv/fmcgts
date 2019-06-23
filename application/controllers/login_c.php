<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_c extends CI_Controller
{
	//Function to display the login form
	public function index()
	{
		//display login form
		$data['main_content'] = 'login/login_form';
        $this->load->view('includes/template', $data);
    }

	public function login()
	{
		$this->load->model('Login_m');
		//load the model and try login.
		if(!$this->Login_m->login())
		{
			redirect('./');
		}
		//refresh();
		if($this->session->userdata('is_logged_in'))
		{
			if($this->session->userdata('role') == "manager")
			{
				//redirect to manager controller
				redirect('manager_c/index');
			}
			elseif($this->session->userdata('role') == "trainer")
			{
				//redirect to trainer controller
				redirect('trainer_c/index');
			}
			elseif($this->session->userdata('role') == "trainee")
			{
				//redirect to trainee controller
				redirect('trainee_c/index');
			}
			elseif($this->session->userdata('role') == "admin")
			{
				//redirect to trainee controller
				redirect('admin_c/index');
			}
			echo 'success';
		}
	}
	
	public function logout()
	{
        $this->session->sess_destroy();
        redirect('/');
    }
}
/* End of file login.php */
/* Location: ./application/controllers/login.php */