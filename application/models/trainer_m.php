<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Trainer_m extends CI_Model 
{
    public function insert_trainee()
    {
        $name = $this->session->userdata('name');
        $username = $this->session->userdata('username');
        $password = $this->session->userdata('password');
        $comp_id = $this->session->userdata('comp_id');
        $superior = $this->session->userdata('superior');
        $course = $this->session->userdata('course');

        $sql = "INSERT INTO user(company_id,name,type,username,password,superior) VALUES('$comp_id','$name','trainee','$username','$password','$superior')";
                   
        if ($this->db->query($sql))
        {
            $this->db->select_max('id');
            $query = $this->db->get('user');
            foreach ($query->result() as $row)
             {
                 $user_id = $row->id;
             }
            $sql = "INSERT INTO user_programme(user_id,programme_id) VALUES('$user_id','$course')";
            $this->db->query ($sql);
            $this->session->set_flashdata('success', 'Successfully added Trainee');

        }
        return false;
    }

    public function update_trainee()
    {


            $new_name =  $this->session->userdata('new_name');
            $new_username = $this->session->userdata('new_username');   
            $new_comp_id = $this->session->userdata('new_comp_id');
            $new_superior_id = $this->session->userdata('new_superior_id');
            $new_password = $this->session->userdata('new_password');

           /* echo $new_name;
            echo $new_username;
            echo $new_comp_id;
            echo $new_superior_id;*/

            $trainee_id = $this->session->userdata('trainee_id');


        $trainee_data = array(
                'name' => $new_name,
                'username' => $new_username,
                'company_id' => $new_comp_id,
                'superior' => $new_superior_id,
                'password' => $new_password, 
                );

        $this->db->where('id', $trainee_id);
        
        $this->db->update('user', $trainee_data);
       
    }

    public function get_all_trainees()
    {
        $loginId = $this->session->userdata('userid');
        $comp_id = $this->session->userdata('comp_id');

        //echo $loginId;
        //echo $comp_id;
    

        $sql = "SELECT * FROM user WHERE superior = '$loginId' AND company_id = '$comp_id'";

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


    public function get_trainee_details()
    {
        $trainee_id = $this->session->userdata('trainee_id');
        $sql = "SELECT * FROM user WHERE id = '$trainee_id'";

        $query = $this->db->query($sql);


        return $query->result();
    }



   public function get_companies()
    {
       $query = $this->db->query('SELECT id, name  FROM company');     
 
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

    public function delete_trainee()
    
    {

        $trainee_id = $this->session->userdata('trainee_id');

        $sql1 = "DELETE FROM user WHERE id = '$trainee_id'";
        $query = $this->db->query($sql1);
        $sql2 = "DELETE FROM user_programme WHERE user_id = '$trainee_id'";

        $query = $this->db->query($sql2);



    }
    public function get_company()
    { 

        $loginId = $this->session->userdata('userid');


        $sql = "SELECT company.id,company.name FROM company INNER JOIN user_company ON company.id = user_company.company_id  WHERE user_company.user_id = $loginId";
        $query = $this->db->query($sql);

        //return $query->result();     
 
       if ($query->num_rows() > 0)        
        {

            foreach($query->result_array() as $row)
            {
                $return[$row['id']] = $row['name'];
            }
        }
        return $return;
           
    }

    function get_selected_module()
    {

        $course_selection = $this->session->userdata('programme_selection');

         $sql = "SELECT id,name FROM module
                
                    WHERE programme_id = '$course_selection'";

            $query = $this->db->query($sql);

            return $query->result();  


    }
    function get_selected_trainees()
    {

            $company_selection = $this->session->userdata('company_selection');
            $course_selection = $this->session->userdata('programme_selection');

          
            $sql = "SELECT user.id,user.name FROM user 
                    INNER JOIN user_programme ON user.id = user_programme.user_id
                    WHERE user_programme.programme_id ='$course_selection' AND user.company_id = '$company_selection'";

            $query = $this->db->query($sql);

            return $query->result();     

 
           

    }

    function get_trainee_score()
    {

        //$trainee_score_id = $this->session->userdata('trainee_score_id');
        //$trainee_score_id = $this->session->userdata('trainee_score_id');

        $sql = "SELECT practical,theory,module_id,trainee_id FROM scores";     
 
        $query = $this->db->query($sql);

        return $query->result();     
 

    }

    function get_trainee_score_details()
    {

       // $trainee_score_id = $this->session->userdata('trainee_score_id');
        $trainee_id = $this->session->userdata('trainee_score_id');


        $sql = "SELECT practical,theory,module_id FROM scores WHERE trainee_id = '$trainee_id' ";     
 
        $query = $this->db->query($sql);

        return $query->result();  
 

    }


    public function get_superiors()
    {
       $query = $this->db->query('SELECT id, name FROM user WHERE type="manager"');     
 
        if ($query->num_rows() > 0)        
        {

            foreach($query->result_array() as $row)
            {
                $return[$row['id']] = $row['name'];
            }
        }
        return $return;

    }

   public function choose_superiors()
    {
        $comp_id = $this->session->userdata('comp_id');
        $user_type = "manager";
        $this->db->select('id, name');
        $this->db->from('user');
        $this->db->where('type', $user_type); 
        $this->db->where('company_id', $comp_id);
        $query = $this->db->get();
        foreach($query->result_array() as $row)
            {
                $return[$row['id']] = $row['name'];
                
            }
           
            return $return;
    }

public function choose_courses()
    {
        $this->db->select('id, name');
        $this->db->from('programme');
        $query = $this->db->get();
        foreach($query->result_array() as $row)
            {
                $return[$row['id']] = $row['name'];
            }
            return $return;
    }

}
/* End of file trainer_m.php */
/* Location: ./application/models/trainer_m.php */