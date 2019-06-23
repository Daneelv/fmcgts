<div class="forms" >
    <h1>Add Manager</h1>
    <?php
        echo '<div class="success">';
        echo $this->session->flashdata('success');
        echo '</div>';

        echo '<div class="errors">';
        echo validation_errors();
        echo '</div>';

        $attributes = array('name' => 'addForm', 'id' => 'addForm');
        echo form_open('admin_c/add_manager', $attributes);

        //$types = array('manager','trainer');
                    
    ?>
    <div class='inputline'>
    Name: <input type="text" title="Name" name="name" maxlength="50" value="<?php echo set_value('name', 'Name'); ?>" onclick="if(this.value=='Name'){this.value=''}"/>
     </div>     
    
    <div class='inputline'>    
    Username: <input type="text" title="Username" name="username" maxlength="50" value="<?php echo set_value('username', 'Username'); ?>" onclick="if(this.value=='Username'){this.value=''}"/>
     </div>     
    
    <div class='inputline'>    
    Password: <input type="text" title="Password" name="password" maxlength="50" value="<?php echo set_value('password', 'Password'); ?>" onclick="if(this.value=='Password'){this.value=''}"/>
     </div>     
    
    
    <?php 
        //echo form_dropdown('selected_type', $types),"<br/>";
    ?>
    
    
    <div class='inputline'>
    Company:     
      <?php 
        echo form_dropdown('selected_company', $company_names),"<br/>";
    ?>
     </div>     
    
    <div class='inputbutton'>     
    <input type="submit" value="Add" name="submit" />    
    <input type="reset" value="Reset" name="reset" />    
     </div> 
     
     
    <?php
        echo form_close();
    ?>

</div>
