<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Trainer_c extends CI_Controller {

    //constructor function
    function __construct() {
        parent::__construct();

        if ($this->session->userdata('is_logged_in')) {
            //if user not of type trainer 
            if ($this->session->userdata('role') !== 'trainer') {
                //redirect to login page
                $this->session->set_flashdata('error', 'Need to be a <b>trainer</b> to access that location');
                redirect('login_c/login');
            }
        } else {
            $this->session->set_flashdata('error', 'Need to be <b>logged in</b> to access that location');
            redirect('login_c/login');
        }
        
 
    }

    public function index() 
    {
        

        //get all trainees with same companyID and superior id == myID
        $this->load->model('Trainer_m');
        $data['trainees'] = $this->Trainer_m->get_all_trainees();

        //display index
        $data['main_content'] = 'trainer/index';
        $this->load->view('includes/template', $data);
    }

    //lets the trainer register his subordinates
    public function add_trainee() 
    {

        $this->load->model('Trainer_m');

        //if the form data is on post
        if ($this->input->post('submit') == "Add") 
        {

       
        
            $this->load->library('form_validation');
           

            //validation
            $this->form_validation->set_rules('name', 'Full Name', 'required|min_length[3]');
            $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|is_unique[user.username]');
            $this->form_validation->set_rules('password', 'Password', 'required|sha1');



            if ($this->form_validation->run() == FALSE) 
            {

                
                //redirect('trainer_c/add_trainee');


                $data['main_content'] = 'trainer/add_trainee';
                
            }
            else
            {


                // $this->load->model('Trainer_m');
                $name = $this->input->post('name');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $comp_id = $this->input->post('company_selection');

                
                $this->session->set_userdata('name', $name);
                $this->session->set_userdata('username', $username);
                $this->session->set_userdata('password', $password);
                $this->session->set_userdata('comp_id', $comp_id);


                redirect('trainer_c/choose_courses');
             
                
            }
        
        }

        else
        {
            ////display add form
            //$this->Trainer_m->get_companys();
            $data['company_names'] = $this->Trainer_m->get_companies();
            $data['main_content'] = 'trainer/add_trainee';

            
        }

            $this->load->view('includes/template', $data);

    }

    
    
    public function update_trainee_details() 
    {

    
        $id = $this->session->userdata('trainee_id');


        $this->load->model('Trainer_m');

        if ($this->input->post('submit') == "Save") 
        {
 
            $this->load->library('form_validation');
           

            //validation
            $this->form_validation->set_rules('name', 'Full Name', 'required|min_length[3]');
            $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]');
            $this->form_validation->set_rules('conPassword', 'conPassword', 'required|sha1');
            $this->form_validation->set_rules('password', 'password', 'required|sha1');



            if ($this->form_validation->run() == FALSE) 
            {

                
                //redirect('trainer_c/add_trainee');
                $data['company_names'] = $this->Trainer_m->get_companies(); 
                $data['superior_names'] = $this->Trainer_m->get_superiors();
                $data['trainee'] = $this->Trainer_m->get_trainee_details();
                $data['main_content'] = 'trainer/edit_trainee_details';
                
            }
            else
            {

                if($this->input->post('password')==$this->input->post('conPassword'))
                {       

                    $new_name = $this->input->post('name');
                    $new_username = $this->input->post('username');
                    $new_comp_id = $this->input->post('company_selection');
                    $new_superior_id = $this->input->post('superior_selection');
                    $new_pass = $this->input->post('conPassword');

                    $this->session->set_userdata('new_name', $new_name);
                    $this->session->set_userdata('new_username', $new_username);
                    $this->session->set_userdata('new_comp_id', $new_comp_id);
                    $this->session->set_userdata('new_superior_id', $new_superior_id);
                    $this->session->set_userdata('new_password', $new_pass);


                    $this->Trainer_m->update_trainee();
                    echo "User successfully updated";
                    $data['trainees'] = $this->Trainer_m->get_all_trainees();
                    $data['main_content'] = 'trainer/edit_trainees';
                    
                }
                else
                {
                    echo "passwords do not match";
                    $data['company_names'] = $this->Trainer_m->get_companies(); 
                    $data['superior_names'] = $this->Trainer_m->get_superiors();
                    $data['trainee'] = $this->Trainer_m->get_trainee_details();
                    $data['main_content'] = 'trainer/edit_trainee_details';
                }
            } 
        }    
            else
            {
               
                $data['main_content'] = 'trainer/edit_trainee_details';
               
                
            }
                $this->load->view('includes/template', $data);
        

            
    }

           
    public function choose_courses()
    {

        $this->load->model('Trainer_m');
        $data['superiors'] = $this->Trainer_m->choose_superiors();
        $data['courses'] = $this->Trainer_m->choose_courses();
        $data['main_content'] = 'trainer/trainee_data';
        $this->load->view('includes/template', $data);

        if ($this->input->post('submit') == "Add") 
        {
            $superior = $this->input->post('superior_selection');
            $course = $this->input->post('course_selection');
            $this->session->set_userdata('superior', $superior);
            $this->session->set_userdata('course', $course);
            $this->Trainer_m->insert_trainee();
            redirect('trainer_c/choose_companies');
        }
    }

    function choose_company_programme()
    {

        $this->load->model('Trainer_m');
        $data['course_names'] = $this->Trainer_m->choose_courses();
        $data['company_names'] = $this->Trainer_m->get_companies();


        if ($this->input->post('submit') == "Add") 
        {
            $company_selection = $this->input->post('company_selection');
            $course_selection = $this->input->post('programme_selection');

            $this->session->set_userdata('company_selection', $company_selection);
            $this->session->set_userdata('programme_selection', $course_selection);

            $company_selection = $this->session->userdata('company_selection');
            $course_selection = $this->session->userdata('programme_selection');
          
           
            //$this->Trainer_m->get_selected_trainees();
            $data['sel'] = $this->Trainer_m->get_selected_trainees();

            $data['trainee_scores'] = $this->Trainer_m->get_trainee_score();
            $data['trainees_scores'] = $this->Trainer_m->get_trainee_score_details();
            $data['module_selection'] = $this->Trainer_m->get_selected_module();
            $data['main_content'] = 'trainer/view_selected_trainees';
        
        }
        else
        {
            $data['course_names'] = $this->Trainer_m->choose_courses();
            $data['company_names'] = $this->Trainer_m->get_companies();
            $data['main_content'] = 'trainer/choose_company_programme';
           

        }
         $this->load->view('includes/template', $data);

    }


    public function edit_trainees() 
    {

        //$loginId = $this->session->userdata('userid');
        //$comp_id = $this->session->userdata('comp_id');

        $this->load->model('Trainer_m');
        $data['trainees'] = $this->Trainer_m->get_all_trainees();
        $data['main_content'] = 'trainer/edit_trainees';
        $this->load->view('includes/template', $data);

    }


    public function edit_trainees_details($id)
    {
        $this->session->set_userdata('trainee_id', $id);
        $this->load->model('Trainer_m');
        $data['trainee'] = $this->Trainer_m->get_trainee_details();
        $data['company_names'] = $this->Trainer_m->get_companies(); 
        $data['superior_names'] = $this->Trainer_m->get_superiors();
        $data['main_content'] = 'trainer/edit_trainee_details';
        $this->load->view('includes/template', $data);
        $trainee_id = $this->session->userdata('trainee_id');



    }
    public function view_delete_user($id)
    {
       
        $this->session->set_userdata('trainee_id',$id);

        $this->load->model('Trainer_m');
        
        $data['trainee'] = $this->Trainer_m->get_trainee_details();
        $data['main_content'] = 'trainer/Delete_user';
        $this->load->view('includes/template', $data);
        $trainee_id = $this->session->userdata('trainee_id');

        //redirect('trainer_c/delete_user');
 
        
        

          
    }

    public function edit_trainees_score($id)
    {
        $this->session->set_userdata('trainee_score_id',$id);

        
        $this->load->model('Trainer_m');
        $data['trainees_scores'] = $this->Trainer_m->get_trainee_score_details();
        $data['main_content'] = 'trainer/view_trainee_scores';
        $this->load->view('includes/template', $data);

        $trainee_id = $this->session->userdata('trainee_score_id');



    }

    public function delete_user($id)
    {
       
        $trainee_id = $this->session->set_userdata('trainee_id',$id);

         $this->load->model('Trainer_m');

        $data['del'] = $this->Trainer_m->delete_trainee();
        $data['company_names'] = $this->Trainer_m->get_company();
        $data['main_content'] = 'trainer/choose_company';
      
        $this->load->view('includes/template', $data);

        echo "User deleted successfully!";

        //echo redirect('trainer_c/edit_trainees');
          
    }



    
    public function choose_companies()
    {
        $this->load->model('Trainer_m');

        //if the form data is on post
       if ($this->input->post('submit') =="Go") 
        {

            $cId =$this->input->post('comp_selection');

             $this->session->set_userdata('comp_id',$cId);

             $this->Trainer_m->get_company();
            // $data['main_content'] = 'trainer_c/edit_trainees';
            redirect('trainer_c/edit_trainees');
            
        }
        else
        {
            ////display companies on startup
            //$this->Trainer_m->get_companys();
            $data['company_names'] = $this->Trainer_m->get_company();
            $data['main_content'] = 'trainer/choose_company';
        }

         $this->load->view('includes/template', $data);

          
    }

    public function display_scores()
    {
        $this->load->model('Trainer_m');
        $data['company_names'] = $this->Trainer_m->get_companies();
    }
}
/* End of file trainer.php */
/* Location: ./application/controllers/trainer.php */