<div class="forms" >
    <h1>Edit Trainees Details</h1>

    <?php


        foreach ($trainee as $train)
        {
              
            
            $name = $train->name;
            $company_id = $train->company_id;
            $type = $train->type;
            $password = $train->password;
            $username = $train->username;
            $superior = $train->superior;

        }

            //print_r()
        
            /*$new_name = $this->session->set_userdata('new_name');
            $new_username = $this->session->userdata('username');
            $new_comp_id =$this->session->userdata('comp_id');
            $new_superior_id = $this->session->userdata('superior_id');*/
  
            echo form_open('trainer_c/update_trainee_details');
            echo '<div class="errors">';
            echo validation_errors();
            echo '</div>';

        ?>


       
			<div class='inputline'>Name:<input type="text" title="Full Name" name="name" maxlength="50" value="<?php echo set_value('name',$name);?>"/></div>

            <div class='inputline'>Username:<input type="text" title="Username" name="username" maxlength="50" value="<?php echo set_value('username', $username);?>"/></div>

            <div class='inputline'>New Password:<input type="text" title="password" name="password" maxlength="50" value="<?php echo set_value('password',$password);?>"/></div>

            <div class='inputline'>Confirm New Password:<input type="text" title="conPassword" name="conPassword" maxlength="50" value="<?php echo set_value('conPassword', $password);?>"/></div>

            <div class='inputline'>Company: <?php 
            echo form_dropdown('company_selection', $company_names,$company_id);
        ?></div>

            <div class='inputline'>Superior: <?php 
            echo form_dropdown('superior_selection', $superior_names,$superior);
        ?></div>
             
  
            <div class='inputbutton'><input type="submit" value="Save" name="submit" />
			<input type="reset" value="Reset" name="reset" /></div>


    <?php


        echo form_close();
    ?>

</div>
