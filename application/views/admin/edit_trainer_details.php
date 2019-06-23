<div class="forms" >
    <h1>Edit Trainer</h1>
    <?php
        echo "Trainer Details:<br/>";
        foreach ($trainer as $train)
        {
            $name = $train->name;
            $username = $train->username;
            $password = $train->password;
            $superior = $train->superior;
            $company_id = $train->company_id;
           
        }
        echo form_open('admin_c/update_trainer_details');
    ?>
  
    Name: <input type="text" title="Name" name="name" maxlength="50" value="<?php echo set_value('name', $name); ?>" onclick="if(this.value=='Name'){this.value=''}"/>
    Username: <input type="text" title="Username" name="username" maxlength="50" value="<?php echo set_value('username', $username); ?>" onclick="if(this.value=='Username'){this.value=''}"/>
    Password: <input type="text" title="Password" name="password" maxlength="50" value="<?php echo set_value('password', $password); ?>" onclick="if(this.value=='Password'){this.value=''}"/>
    Superior: <input type="number" title="Superior" name="superior" value="<?php echo set_value('superior', $superior); ?>" onclick="if(this.value== 0){this.value=''}"/>
    Company:     
      <?php 
        echo form_dropdown('selected_company', $company_names,$company_id),"<br/>";
    ?>
  
    <input type="submit" value="Save" name="submit" />    
    <input type="reset" value="Reset" name="reset" />    
    <?php
        echo form_close();
    ?>
</div>