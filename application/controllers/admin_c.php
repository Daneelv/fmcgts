<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class admin_c extends CI_Controller 
{
    //constructor function
    function __construct() 
    {
        parent::__construct();

        if ($this->session->userdata('is_logged_in'))
        {

            //if user not of type admin 
            if ($this->session->userdata('role') !== 'admin')
            {
                //redirect to login page if not an admin with an error.
                $this->session->set_flashdata('error', 'Need to be a <b>admin</b> to access that location');
                redirect('login_c/login');
            }
        } 
        else 
        {
            //Redirect to login if not logged in with error
            $this->session->set_flashdata('error', 'Need to be <b>logged in</b> to access that location');
            redirect('login_c/login');
        }
    }

    public function index() 
    {
        //display index page
        $data['main_content'] = 'admin/index';
        $this->load->view('includes/template', $data);
    }

    public function add_modules() 
    {
        
        $this->load->model('Admin_m');
        //if the form data is on post

        if ($this->input->post('submit') == "Add") 
        {
            $seta_number = $this->input->post('seta_number');
            $module_name = $this->input->post('module_name');
            $practical = $this->input->post('practical');
            $theory = $this->input->post('theory');
            $programme_id = $this->input->post('programme_selection');
            $this->session->set_userdata('seta_number', $seta_number);
            $this->session->set_userdata('module_name', $module_name);
            $this->session->set_userdata('practical', $practical);
            $this->session->set_userdata('theory', $theory);
            $this->session->set_userdata('programme_id', $programme_id);
            $this->Admin_m->insert_modules(); 

        }
        else
        {
            //display add form

            $data['programme_names'] = $this->Admin_m->get_programme_list();
            $data['main_content'] = 'admin/add_modules';
        }
        $this->load->view('includes/template', $data);
    }

     public function add_company() 
    {
        $this->load->model('Admin_m');
        //if the form data is on post
        $data['trainer_names'] = $this->Admin_m->get_trainers();

        if ($this->input->post('submit') == "Add") 
        {
            $company_name = $this->input->post('company_name');
            //$company_logo = $this->input->post('company_logo');
            $trainer= $this->input->post('trainer_selection');

            $this->session->set_userdata('company_name', $company_name);
            //$this->session->set_userdata('company_logo', $company_logo);
            $this->session->set_userdata('trainer_selection', $trainer);

            $this->Admin_m->insert_company(); 

        }
        else
        {
            //display add form
            $data['main_content'] = 'admin/add_company';
        }

        $this->load->view('includes/template', $data);
    }

     public function add_manager()
    {
        $this->load->model('Admin_m');
        //if the form data is on post

        //$data['user_type'] = $this->Admin_m->get_all_types();
        $data['company_names'] = $this->Admin_m->get_all_companies();


        if ($this->input->post('submit') == "Add") 
        {

          

            $company_id = $this->input->post('selected_company');
            $name = $this->input->post('name');
            $type = $this->input->post('type');
            $username= $this->input->post('username');
            $password= $this->input->post('password');
           


            $this->session->set_userdata('selected_company', $company_id);
            $this->session->set_userdata('name',  $name);
            $this->session->set_userdata('type', $type);
            $this->session->set_userdata('username',  $username);
            $this->session->set_userdata('password', $password);
          


            $this->Admin_m->insert_manager(); 

        }
        else
        {
            //display add form

            $data['main_content'] = 'admin/add_manager';
        }

        $this->load->view('includes/template', $data);
    }
      public function add_trainer()
    {
        $this->load->model('Admin_m');
        //if the form data is on post

       
        $data['company_names'] = $this->Admin_m->get_all_companies();


        if ($this->input->post('submit') == "Add") 
        {

          

            $company_id = $this->input->post('selected_company');
            $name = $this->input->post('name');
           
            $username= $this->input->post('username');
            $password= $this->input->post('password');
           


            $this->session->set_userdata('selected_company', $company_id);
            $this->session->set_userdata('name',  $name);
           
            $this->session->set_userdata('username',  $username);
            $this->session->set_userdata('password', $password);
        


            $this->Admin_m->insert_trainer(); 

        }
        else
        {
            //display add form
            $data['main_content'] = 'admin/add_trainer';
        }

        $this->load->view('includes/template', $data);
    }



    public function add_programme() 
    {
        $this->load->model('Admin_m');
        //if the form data is on post
        
        //$data['module_names'] = $this->Admin_m->get_modules();

        if ($this->input->post('submit') == "Add") 
        {
            $programme_name = $this->input->post('programme_name');
            //$module_selection = $this->input->post('module_selection');
            

            $this->session->set_userdata('programme_name', $programme_name);

           
           
           
            $this->Admin_m->insert_programme();
            
            //$array = $this->session->userdata('array_module');

            //print_r($array);
            echo "programme added successfully!<br/>";

            /*foreach ($_POST['Modules'] as $mods)
            {
                //$this->session->set_userdata($mods);
                //$selected_mods[] = $this->session->userdata($mods);
                print "test selected multiple modules is $mods<br/>";
            }*/

            //print_r($selected_mods);

            $data['main_content'] = 'admin/index';

        }
        else
        {
            //display add form
            //$data['module_names'] = $this->Admin_m->get_modules();
            $data['main_content'] = 'admin/add_programme';
        }

        $this->load->view('includes/template', $data);
    }

public function edit_modules() 
    {
        $this->load->model('Admin_m');
        $data['modules'] = $this->Admin_m->get_all_modules();
        $data['main_content'] = 'admin/edit_modules';
        $this->load->view('includes/template', $data);
    }



public function edit_module_details($id)
    {
        $this->session->set_userdata('module_id', $id);
        $module_id = $this->session->userdata('module_id');
        $this->load->model('Admin_m');
        $data['module'] = $this->Admin_m->get_module_details();
        $data['main_content'] = 'admin/edit_module_details';
        $this->load->view('includes/template', $data);
    }
public function update_module_details() 
    {
        $id = $this->session->userdata('module_id');
        $this->load->model('Admin_m');
        if ($this->input->post('submit') == "Save") 
        {
                $new_seta_number = $this->input->post('seta_number');
                $new_name = $this->input->post('name');
                $new_practical = $this->input->post('practical');
                $new_theory = $this->input->post('theory');
                $this->session->set_userdata('new_seta_number', $new_seta_number);
                $this->session->set_userdata('new_practical', $new_practical);
                $this->session->set_userdata('new_name', $new_name);
                $this->session->set_userdata('new_theory', $new_theory);
                $this->Admin_m->update_module();
                redirect('admin_c/index');
        }     
        else
        {
            $data['main_content'] = 'trainer/edit_trainee_details';
        }
        $this->load->view('includes/template', $data);
    }

           public function view_delete_module($id)
    {
       
        $this->session->set_userdata('module_id',$id);
        $this->load->model('Admin_m');
        $data['module'] = $this->Admin_m->get_module_details();
        $data['main_content'] = 'admin/Delete_module';
        $this->load->view('includes/template', $data);
        $module_id = $this->session->userdata('module_id');
          
    }

    public function delete_module($id)
    {
       
        $module_id = $this->session->set_userdata('module_id',$id);

         $this->load->model('Admin_m');

        $data['del'] = $this->Admin_m->delete_module();
        $data['modules'] = $this->Admin_m->get_all_modules();
        $data['main_content'] = 'admin/edit_modules';
      
        $this->load->view('includes/template', $data);

        echo "Module deleted successfully!";
          
    }




    public function edit_companies()
    {
        $this->load->model('Admin_m');
        $data['company_names'] = $this->Admin_m->get_companies();
        $data['main_content'] = 'admin/edit_companies';
        $this->load->view('includes/template', $data);

    }


public function edit_company_details($id)
    {
        $this->session->set_userdata('company_id', $id);
        $company_id = $this->session->userdata('company_id');
        $this->load->model('Admin_m');
        $data['trainer_names'] = $this->Admin_m->get_trainers();
        $data['company'] = $this->Admin_m->get_company_details();
        $data['main_content'] = 'admin/edit_company_details';
        $this->load->view('includes/template', $data);
    }


public function update_company_details() 
    {
        $id = $this->session->userdata('company_id');
        $this->load->model('Admin_m');
        if ($this->input->post('submit') == "Save") 
        {
                $new_name = $this->input->post('name');
                $new_logo = $this->input->post('logo');
                $new_other = $this->input->post('other');
                $new_trainer = $this->input->post('trainer');
                $this->session->set_userdata('new_name', $new_name);
                $this->session->set_userdata('new_logo', $new_logo);
                $this->session->set_userdata('new_other', $new_other);
                $this->session->set_userdata('new_trainer', $new_trainer);
                $this->Admin_m->update_company();
                redirect('admin_c/index');
        }     
        else
        {
            $data['main_content'] = 'admin/edit_company_details';
        }
        $this->load->view('includes/template', $data);
    }
         public function view_delete_company($id)
    {
       
        $this->session->set_userdata('company_id',$id);
        $this->load->model('Admin_m');
        $data['company'] = $this->Admin_m->get_company_details();
        $data['main_content'] = 'admin/Delete_company';
        $this->load->view('includes/template', $data);
        $company_id = $this->session->userdata('company_id');
          
    }

    public function delete_company($id)
    {
       
        $company_id = $this->session->set_userdata('company_id',$id);

         $this->load->model('Admin_m');

        $data['del'] = $this->Admin_m->delete_company();
        $data['company_names'] = $this->Admin_m->get_companies();
        $data['main_content'] = 'admin/edit_companies';
      
        $this->load->view('includes/template', $data);

        echo "Company deleted successfully!";
          
    }












 

    public function edit_managers() 
    {

        //$loginId = $this->session->userdata('userid');
        //$comp_id = $this->session->userdata('comp_id');

        $this->load->model('Admin_m');
        $data['managers'] = $this->Admin_m->get_all_managers();
        $data['main_content'] = 'admin/edit_managers';
        $this->load->view('includes/template', $data);

    }

     public function edit_manager_details($id)
    {
        $this->session->set_userdata('manager_id', $id);
        $manager_id = $this->session->userdata('manager_id');
        $this->load->model('Admin_m');
        $data['company_names'] = $this->Admin_m->get_all_companies();
        $data['manager'] = $this->Admin_m->get_manager_details();
        $data['main_content'] = 'admin/edit_manager_details';
        
        $this->load->view('includes/template', $data);
    }

    public function update_manager_details() 
    {
        $manager_id = $this->session->userdata('manager_id');
        $this->load->model('Admin_m');
        if ($this->input->post('submit') == "Save") 
        {
            $new_name = $this->input->post('name');
            $new_company_id = $this->input->post('selected_company');   
            $new_username= $this->input->post('username');
            $new_password= $this->input->post('password');
            $new_superior= $this->input->post('superior');



            $this->session->set_userdata('new_selected_company', $new_company_id);
            $this->session->set_userdata('new_name',  $new_name); 
            $this->session->set_userdata('new_username',  $new_username);
            $this->session->set_userdata('new_password', $new_password);
            $this->session->set_userdata('new_superior', $new_superior);

            
                
              
                $this->Admin_m->update_manager();
                redirect('admin_c/index');
        }     
        else
        {
            $data['company_names'] = $this->Admin_m->get_all_companies();
            $data['manager'] = $this->Admin_m->get_manager_details();
            $data['main_content'] = 'admin/edit_manager_details';
        }
        $this->load->view('includes/template', $data);
    }
         public function view_delete_manager($id)
    {
       
        $this->session->set_userdata('manager_id',$id);
        $this->load->model('Admin_m');
        $data['manager'] = $this->Admin_m->get_manager_details();
        $data['main_content'] = 'admin/Delete_manager';
        $this->load->view('includes/template', $data);
        $manager_id = $this->session->userdata('manager_id');
          
    }

    public function delete_manager($id)
    {
       
        $manager_id = $this->session->set_userdata('manager_id',$id);

         $this->load->model('Admin_m');

        $data['del'] = $this->Admin_m->delete_manager();
        $data['managers'] = $this->Admin_m->get_all_managers();
        $data['main_content'] = 'admin/edit_managers';
      
        $this->load->view('includes/template', $data);

        echo "Manager deleted successfully!";
          
    }













      public function edit_trainers() 
    {

        //$loginId = $this->session->userdata('userid');
        //$comp_id = $this->session->userdata('comp_id');

        $this->load->model('Admin_m');
        $data['trainers'] = $this->Admin_m->get_all_trainers();
        $data['main_content'] = 'admin/edit_trainers';
        $this->load->view('includes/template', $data);

    }


      public function edit_trainer_details($id)
    {
        $this->session->set_userdata('trainer_id', $id);
        $manager_id = $this->session->userdata('trainer_id');
        $this->load->model('Admin_m');
        $data['company_names'] = $this->Admin_m->get_all_companies();
        $data['trainer'] = $this->Admin_m->get_trainer_details();
        $data['main_content'] = 'admin/edit_trainer_details';
        
        $this->load->view('includes/template', $data);
    }

    public function update_trainer_details() 
    {
        $trainer_id = $this->session->userdata('trainer_id');
        $this->load->model('Admin_m');
        if ($this->input->post('submit') == "Save") 
        {
            $new_name = $this->input->post('name');
            $new_company_id = $this->input->post('selected_company');   
            $new_username= $this->input->post('username');
            $new_password= $this->input->post('password');
            $new_superior= $this->input->post('superior');



            $this->session->set_userdata('new_selected_company', $new_company_id);
            $this->session->set_userdata('new_name',  $new_name); 
            $this->session->set_userdata('new_username',  $new_username);
            $this->session->set_userdata('new_password', $new_password);
            $this->session->set_userdata('new_superior', $new_superior);

            
                
              
                $this->Admin_m->update_trainer();
                redirect('admin_c/index');
        }     
        else
        {
            $data['company_names'] = $this->Admin_m->get_all_companies();
            $data['trainer'] = $this->Admin_m->get_trainer_details();
            $data['main_content'] = 'admin/edit_trainer_details';
        }
        $this->load->view('includes/template', $data);
    }
         public function view_delete_trainer($id)
    {
       
        $this->session->set_userdata('trainer_id',$id);
        $this->load->model('Admin_m');
        $data['trainer'] = $this->Admin_m->get_trainer_details();
        $data['main_content'] = 'admin/Delete_trainer';
        $this->load->view('includes/template', $data);
        $trainer_id = $this->session->userdata('trainer_id');
          
    }

    public function delete_trainer($id)
    {
       
        $trainer_id = $this->session->set_userdata('trainer_id',$id);

         $this->load->model('Admin_m');

        $data['del'] = $this->Admin_m->delete_trainer();
        $data['trainers'] = $this->Admin_m->get_all_trainers();
        $data['main_content'] = 'admin/edit_trainers';
      
        $this->load->view('includes/template', $data);

        echo "Trainer deleted successfully!";
          
    }
















     public function edit_programme() 
    {

        $this->load->model('Admin_m');
        $data['programmes'] = $this->Admin_m->get_all_programmes();
        $data['main_content'] = 'admin/edit_programme';
        $this->load->view('includes/template', $data);

    }
    public function edit_programme_details($id)
    {
        $this->session->set_userdata('programme_id', $id);
        $programme_id = $this->session->userdata('programme_id');
        $this->load->model('Admin_m');
        $data['programme'] = $this->Admin_m->get_programme_details();
        $data['main_content'] = 'admin/edit_programme_details';
        $this->load->view('includes/template', $data);
    }

    public function update_programme_details() 
    {
        $id = $this->session->userdata('programme_id');
        $this->load->model('Admin_m');
        if ($this->input->post('submit') == "Save") 
        {
                $new_name = $this->input->post('name');
               
                $this->session->set_userdata('new_name', $new_name);
                
              
                $this->Admin_m->update_programme();
                redirect('admin_c/index');
        }     
        else
        {
            $data['main_content'] = 'admin/edit_programme_details';
        }
        $this->load->view('includes/template', $data);
    }
         public function view_delete_programme($id)
    {
       
        $this->session->set_userdata('programme_id',$id);
        $this->load->model('Admin_m');
        $data['programme'] = $this->Admin_m->get_programme_details();
        $data['main_content'] = 'admin/Delete_programme';
        $this->load->view('includes/template', $data);
        $programme_id = $this->session->userdata('programme_id');
          
    }

    public function delete_programme($id)
    {
       
        $programme_id = $this->session->set_userdata('programme_id',$id);

         $this->load->model('Admin_m');

        $data['del'] = $this->Admin_m->delete_programme();
        $data['programmes'] = $this->Admin_m->get_all_programmes();
        $data['main_content'] = 'admin/edit_programme';
      
        $this->load->view('includes/template', $data);

        echo "Programme deleted successfully!";
          
    }





}
/* End of file admin_c.php */
/* Location: ./application/controllers/admin_c.php */