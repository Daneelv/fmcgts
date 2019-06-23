<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_m extends CI_Model 

{
    public function insert_modules()
    {

        $seta_number = $this->session->userdata('seta_number');
        $module_name = $this->session->userdata('module_name');
        $practical = $this->session->userdata('practical');
        $theory = $this->session->userdata('theory');
        $programme = $this->session->userdata('programme_id');
    
        $sql = "INSERT INTO module(seta_number,name,practical,theory,programme_id) VALUES('$seta_number','$module_name','$practical','$theory','$   programme')";
                   
        if ($this->db->query($sql))
        {
            $this->session->set_flashdata('success', 'Successfully added Trainee');
            redirect('admin_c/index');
        }
        return false;
    }

     public function insert_manager()
    {
        $company_id = $this->session->userdata('selected_company');
        $name = $this->session->userdata('name');
        $username = $this->session->userdata('username');
        $password = $this->session->userdata('password');
        $sql = "INSERT INTO user(company_id,name,type,username,password) VALUES('$company_id','$name','manager','$username', '$password')";
                   
        if ($this->db->query($sql))
        {
            $this->session->set_flashdata('success', 'Successfully added Manager');
            redirect('admin_c/index');
        }
        return false;
    }
          

          public function insert_trainer()
    {
        $company_id = $this->session->userdata('selected_company');
        $name = $this->session->userdata('name');
        $username = $this->session->userdata('username');
        $password = $this->session->userdata('password');
          

     

        $sql = "INSERT INTO user(company_id,name,type,username,password) VALUES('$company_id','$name','trainer','$username', '$password')";
                   
        if ($this->db->query($sql))
        {
            $this->session->set_flashdata('success', 'Successfully added Trainer');
            redirect('admin_c/index');
        }
        return false;
    }

    public function insert_company()
    {
        $company_name = $this->session->userdata('company_name');
        //$company_logo = $this->session->userdata('company_logo');
        $trainer = $this->session->userdata('trainer_selection');

        $sql = "INSERT INTO company(name,trainer) VALUES('$company_name','$trainer')";
                   
        if ($this->db->query($sql))
        {
            $this->session->set_flashdata('success', 'Successfully added Company');
            //echo('success');
            redirect('admin_c/index');
        }
        return false;
    }

      public function insert_programme()
    {
        $programme_name = $this->session->userdata('programme_name');
        $selected_modules = $this->session->userdata('module_selection');

        $prog_id = $this->db->select_max('id');

      
        $sql2 = "INSERT INTO  programme(name) VALUES('$programme_name')";


        if ($this->db->query($sql2))
        {
            $this->session->set_flashdata('success', 'Successfully added Programme');
            //redirect('admin_c/index');
        }
        return false;


         $sql2 = "INSERT INTO  programme_module(programme_id,module_id) VALUES('$prog_id','$selected_modules')";


        if ($this->db->query($sql2))
        {
            $this->session->set_flashdata('success', 'Successfully added Programme');
            //redirect('admin_c/index');
        }
        return false;


      }


    public function get_all_modules()
    {
        $this->db->select('id,seta_number,name,practical,theory');
        $this->db->from('module');
        $query = $this->db->get();



        return $query->result();
    }
     public function get_modules()
    {
       $query = $this->db->query('SELECT id, name  FROM module');     
 
        if ($query->num_rows() > 0)        
        {
            foreach($query->result_array() as $row)
            {
                $return[$row['id']] = $row['name'];
            }
        }
        return $return;
    }

   public function get_programme_list()
    {
       $query = $this->db->query('SELECT id, name  FROM programme');     
 
        if ($query->num_rows() > 0)        
        {
            
            //$return[''] = 'Company name';

            foreach($query->result_array() as $row)
            {
                $return[$row['id']] = $row['name'];
            }
        }
        return $return;

            //return $query->result_array();
    }

        public function get_module_details()
    {
        $module_id = $this->session->userdata('module_id');
        $sql = "SELECT * FROM module WHERE id = '$module_id'";

        $query = $this->db->query($sql);


        return $query->result();
    }

     public function get_trainers()
    {
       $query = $this->db->query('SELECT id, name FROM user WHERE type="trainer"');     
 
        if ($query->num_rows() > 0)        
        {

            foreach($query->result_array() as $row)
            {
                $return[$row['id']] = $row['name'];
            }
        }
        return $return;

    }
    public function get_selected_trainers()
    {
      
        $sql = "SELECT * FROM user WHERE type ='trainer'";

        $query = $this->db->query($sql);


        return $query->result();
           
    }




      public function get_all_companies()
    {
      
        $query = $this->db->query('SELECT id,name FROM company');     
 
        if ($query->num_rows() > 0)        
        {

            foreach($query->result_array() as $row)
            {
                $return[$row['id']] = $row['name'];
            }
        }
        return $return;

    }

        public function get_company_details()
    {
        $company_id = $this->session->userdata('company_id');
        $sql = "SELECT * FROM company WHERE id = '$company_id'";

        $query = $this->db->query($sql);


        return $query->result();
    }
    public function update_company()
    {
        $new_name =  $this->session->userdata('new_name');
        //$new_logo = $this->session->userdata('new_logo');   
        $new_trainer = $this->session->userdata('new_trainer');
        $company_id = $this->session->userdata('company_id');
        $company_data = array
        (
            'name' => $new_name,
            //'logo' => $new_logo,
            'trainer' => $new_trainer, 
        );
        $this->db->where('id', $company_id);
        $this->db->update('company', $company_data);
    }

      public function delete_company()
    
    {

        $company_id = $this->session->userdata('company_id');
        $sql1 = "DELETE FROM company WHERE id = '$company_id'";
        $query = $this->db->query($sql1);

    }


   public function get_programmes()
    {
      
        $sql = "SELECT * FROM programme";

        $query = $this->db->query($sql);


        return $query->result();
           
    }

    public function get_new_programme()
    {
      
        $prog_name = $this->session->userdata('programme_name');

        $sql = "SELECT id FROM programme WHERE name = '$prog_name' ";

        $query = $this->db->query($sql);


        return $query->result();
           
    }

    public function get_programme_details()
    {
       $programme_id = $this->session->userdata('programme_id');
        $sql = "SELECT * FROM programme WHERE id = '$programme_id'";

        $query = $this->db->query($sql);


        return $query->result();
           
    }

     public function update_programme()
    {
        $new_name =  $this->session->userdata('new_name');
        $programme_id = $this->session->userdata('programme_id');
        $programme_data = array
        (
            'name' => $new_name,
        );
        $this->db->where('id', $programme_id);
        $this->db->update('programme', $programme_data);
    }

      public function delete_programme()
    
    {

        $programme_id = $this->session->userdata('programme_id');
        $sql1 = "DELETE FROM programme WHERE id = '$programme_id'";
        $query = $this->db->query($sql1);

    }






public function update_module()
    {
        $new_name =  $this->session->userdata('new_name');
        $new_seta_number = $this->session->userdata('new_seta_number');   
        $new_practical = $this->session->userdata('new_practical');
        $new_theory = $this->session->userdata('new_theory');
        $module_id = $this->session->userdata('module_id');
        $module_data = array
        (
            'name' => $new_name,
            'seta_number' => $new_seta_number,
            'practical' => $new_practical,
            'theory' => $new_theory, 
        );
        $this->db->where('id', $module_id);
        $this->db->update('module', $module_data);
    }

public function delete_module()
    
    {

        $module_id = $this->session->userdata('module_id');
        $sql1 = "DELETE FROM module WHERE id = '$module_id'";
        $query = $this->db->query($sql1);

    }

public function get_companies()
    {
      
        $sql = "SELECT * FROM company";

        $query = $this->db->query($sql);


        return $query->result();
           
    }

public function get_all_trainers()
    {
      
        $sql = "SELECT * FROM user WHERE type = 'trainer'";

        $query = $this->db->query($sql);

    
        return $query->result();
    }
public function get_trainer_details()
    {
       $trainer_id = $this->session->userdata('trainer_id');
        $sql = "SELECT * FROM user WHERE id = '$trainer_id'";

        $query = $this->db->query($sql);


        return $query->result();
           
    }

public function update_trainer()
    {
        $new_name =  $this->session->userdata('new_name');
        $new_company_id = $this->session->userdata('new_selected_company');
        $new_username = $this->session->userdata('new_username');
        $new_password = $this->session->userdata('new_password');
        $new_superior = $this->session->userdata('new_superior');





        $trainer_id = $this->session->userdata('trainer_id');

        $trainer_data = array
        (
            'company_id' => $new_company_id,
            'name' => $new_name,
            
            'type' => 'trainer',   
            'username' => $new_username,
            'password' => $new_password,
            'superior' => $new_superior,
        );
        $this->db->where('id', $trainer_id);
        $this->db->update('user', $trainer_data);
    }

public function delete_trainer()
    
    {

        $trainer_id = $this->session->userdata('trainer_id');
        $sql1 = "DELETE FROM user WHERE id = '$trainer_id'";
        $query = $this->db->query($sql1);

    }


public function get_all_managers()
    {
      
        $sql = "SELECT * FROM user WHERE type = 'manager'";

        $query = $this->db->query($sql);


        return $query->result();
    }

public function get_manager_details()
    {
       $manager_id = $this->session->userdata('manager_id');
        $sql = "SELECT * FROM user WHERE id = '$manager_id'";

        $query = $this->db->query($sql);


        return $query->result();
           
    }

public function update_manager()
    {
        $new_name =  $this->session->userdata('new_name');
        $new_company_id = $this->session->userdata('new_selected_company');
        $new_username = $this->session->userdata('new_username');
        $new_password = $this->session->userdata('new_password');
        $new_superior = $this->session->userdata('new_superior');





        $manager_id = $this->session->userdata('manager_id');

        $manager_data = array
        (
            'company_id' => $new_company_id,
            'name' => $new_name,
            
            'type' => 'manager',   
            'username' => $new_username,
            'password' => $new_password,
            'superior' => $new_superior,
        );
        $this->db->where('id', $manager_id);
        $this->db->update('user', $manager_data);
    }

public function delete_manager()
    
    {

        $manager_id = $this->session->userdata('manager_id');
        $sql1 = "DELETE FROM user WHERE id = '$manager_id'";
        $query = $this->db->query($sql1);

    }


public function get_all_programmes()
    {
        //$loginId = $this->session->userdata('userid');
        //$comp_id = $this->session->userdata('comp_id');

        //echo $loginId;
        //echo $comp_id;
    

        $sql = "SELECT * FROM programme";

        $query = $this->db->query($sql);

         
       /* if ($query->num_rows() > 0)        
        {

            foreach($query->result_array() as $row)
            {
                $return[$row['id']] = $row['name'];

               
            }
        }
        return $return;*/


        return $query->result();
    }
}

/* End of file admin_m.php */
/* Location: ./application/models/admin_m.php */