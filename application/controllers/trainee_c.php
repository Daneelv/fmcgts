<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Trainee_c extends CI_Controller {

    //constructor function
    function __construct() {
        parent::__construct();

        if ($this->session->userdata('is_logged_in')) {
            //if user not of type trainer 
            if ($this->session->userdata('role') !== 'trainee') {
                //redirect to login page
                $this->session->set_flashdata('error', 'Need to be a <b>trainee</b> to access that location');
                redirect('login_c/login');
            }
        } else {
            $this->session->set_flashdata('error', 'Need to be <b>logged in</b> to access that location');
            redirect('login_c/login');
        }
    }

    public function index() {
        

        //get all trainees with same companyID and superior id == myID
//        $this->load->model('Trainee_m');
//        $data['trainees'] = $this->Trainee_m->get_all_trainees();
//        
        
        
        //display index
        $data['main_content'] = 'trainee/index';
        $this->load->view('includes/template', $data);
    }
    
}
/* End of file trainee.php */
/* Location: ./application/controllers/trainee.php */